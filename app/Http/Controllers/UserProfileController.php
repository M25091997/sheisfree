<?php

namespace App\Http\Controllers;

use App\Models\UserProfile;
use Illuminate\Http\Request;
use App\Models\UserImage;
use App\Models\UserPhone;
use App\Models\UserService;
use App\Models\UserLanguage;
use App\Models\UserPrice;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('profiles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request->all();
        $validated = $request->validate([
            // Profile basic info
            'name' => 'required|string|max:255',
            'user_type' => 'required|string',
            'city' => 'nullable|string|max:255',
            'about' => 'nullable|string',
            'email' => 'nullable|email|max:255',
            'website' => 'nullable|url|max:255',
            'online_url' => 'nullable|url|max:255',
            'other_url' => 'nullable|url|max:255',
            'gender' => 'required|string',
            'orientation' => 'nullable|string',
            'ethnicity' => 'nullable|string',
            'height' => 'nullable|string',
            'age' => 'required|integer|min:18',
            'bust' => 'nullable|string',
            'hair_color' => 'nullable|string',
            'nationality' => 'required|string',
            'skin_color' => 'nullable|string',
            'shaved' => 'nullable|string',
            'smoke' => 'nullable|boolean',
            'drink' => 'nullable|boolean',
            'health' => 'nullable|string',
            'video_path' => 'nullable|file|mimes:mp4,mov,avi|max:20000',
            'social_media_url' => 'nullable|url',
            'other_social_media' => 'nullable|url',
            'notes' => 'nullable|string',
            'is_active' => 'nullable|boolean',
            'is_member' => 'nullable|boolean',
            'member_date' => 'nullable|date',

            // Images
            'images.*' => 'nullable|image|max:6144', // 6MB each

            // Phones
            'phone_code.*' => 'nullable|string|max:5',
            'phone_number.*' => 'nullable|string|max:20',
            'is_whatsapp.*' => 'nullable',
            'is_telegram.*' => 'nullable',
            'is_signal.*' => 'nullable',
            'is_wechat.*' => 'nullable',

            // Services
            'services.*' => 'nullable|exists:service_types,name',

            // Languages
            'languages.*.name' => 'nullable|string',
            'languages.*.level' => 'nullable|in:Fluent,Good,Basic',

            // Pricing
            'pricing.incall.enabled' => 'sometimes',
            'pricing.incall.amount' => 'nullable|numeric|min:0',
            'pricing.incall.currency' => 'nullable|string|max:3',
            'pricing.outcall.enabled' => 'sometimes',
            'pricing.outcall.amount' => 'nullable|numeric|min:0',
            'pricing.outcall.currency' => 'nullable|string|max:3',
        ]);

        // return $request->all();


        DB::beginTransaction(); // Start transaction

        try {
            $profile = UserProfile::create([
                'user_id' => auth()->id(),
                'name' => $request->name,
                'user_type' => $request->user_type,
                'city' => $request->city,
                'about' => $request->about,
                'email' => $request->email,
                'website' => $request->website,
                'online_url' => $request->online_url,
                'other_url' => $request->other_url,
                'gender' => $request->gender,
                'orientation' => $request->orientation,
                'ethnicity' => $request->ethnicity,
                'height' => $request->height,
                'age' => $request->age,
                'bust' => $request->bust,
                'hair_color' => $request->hair_color,
                'nationality' => $request->nationality,
                'skin_color' => $request->skin_color,
                'shaved' => $request->shaved,
                'smoke' => $request->smoke ?? false,
                'drink' => $request->drink ?? false,
                'health' => $request->health,
                'video_path' => $request->video_path ? $request->video_path->store('videos') : null,
                'social_media_url' => $request->social_media_url,
                'other_social_media' => $request->other_social_media,
                'notes' => $request->notes,
                'is_active' => $request->is_active ?? false,
                'is_member' => $request->is_member ?? false,
                'member_date' => $request->member_date,
            ]);

            // Upload images
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    UserImage::create([
                        'user_profile_id' => $profile->id,
                        'path' => $image->store('images'),
                    ]);
                }
            }

            // Phones
            if ($request->phone_number) {
                foreach ($request->phone_number as $key => $number) {
                    if ($number) {
                        UserPhone::create([
                            'user_profile_id' => $profile->id,
                            'phone_code'      => $request->phone_code[$key] ?? '+00',
                            'phone_number'    => $number,
                            'is_whatsapp'     => isset($request->is_whatsapp[$key]) && $request->is_whatsapp[$key] === 'on',
                            'is_wechat'       => isset($request->is_wechat[$key]) && $request->is_wechat[$key] === 'on',
                            'is_telegram'     => isset($request->is_telegram[$key]) && $request->is_telegram[$key] === 'on',
                            'is_signal'       => isset($request->is_signal[$key]) && $request->is_signal[$key] === 'on',
                        ]);
                    }
                }
            }



            // Services
            if ($request->services) {
                foreach ($request->services as $service) {
                    if ($service) {
                        UserService::create([
                            'user_profile_id' => $profile->id,
                            'name' => $service, // $service is already the string
                        ]);
                    }
                }
            }


            // Languages
            if ($request->languages) {
                foreach ($request->languages as $lang) {
                    if (!empty($lang['language'])) {
                        UserLanguage::create([
                            'user_profile_id' => $profile->id,
                            'language' => $lang['language'],           // map 'language' to 'name'
                            'fluency_level' => $lang['fluency'] ?? 'Basic', // map 'fluency' to 'level'
                        ]);
                    }
                }
            }
            // Pricing
            if ($request->pricing) {
                // Incall
                if (isset($request->pricing['incall'])) {
                    $incall = $request->pricing['incall'];
                    if (!empty($incall['enabled'])) {
                        UserPrice::updateOrCreate(
                            [
                                'user_profile_id' => $profile->id,
                                'service_type'    => 'incall'
                            ],
                            [
                                'duration' => $incall['duration'] ?? null,
                                'price'    => $incall['amount'] ?? null,
                                'currency' => $incall['currency'] ?? 'INR',
                                'is_active' => true
                            ]
                        );
                    }
                }

                // Outcall
                if (isset($request->pricing['outcall'])) {
                    $outcall = $request->pricing['outcall'];
                    if (!empty($outcall['enabled'])) {
                        UserPrice::updateOrCreate(
                            [
                                'user_profile_id' => $profile->id,
                                'service_type'    => 'outcall'
                            ],
                            [
                                'duration' => $outcall['duration'] ?? null,
                                'price'    => $outcall['amount'] ?? null,
                                'currency' => $outcall['currency'] ?? 'INR',
                                'is_active' => true
                            ]
                        );
                    }
                }
            }

            DB::commit(); // Commit if everything succeeds
            return redirect()->route('profiles.index')->with('success', 'Profile created successfully!');
        } catch (\Exception $e) {
            DB::rollback(); // Rollback on error
            Log::error('Profile creation failed: ' . $e->getMessage());
            return back()->withInput()->with('error', 'Failed to create profile. Please try again.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(UserProfile $userProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserProfile $userProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserProfile $userProfile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserProfile $userProfile)
    {
        //
    }
}
