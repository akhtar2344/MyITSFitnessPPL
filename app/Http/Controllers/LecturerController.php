<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LecturerController extends Controller
{
    public function show($id = 0)
    {
        $students = [
            [
                'name' => 'Harry Styles',
                'nrp' => '5026231000',
                'submitted' => 'November 2, 2024',
                'activity' => 'Running',
                'location' => 'KONI',
                'duration' => '1.5 Hours',
                'status' => 'Pending',
                'proof' => 'imagesDetailLecturer/harryStylesProof.png',
                'reviewer' => 'Heru Susanto',
                'comment' => 'Excellent work Harry!',
                'avatar' => 'imagesDetailLecturer/harryStyles.png',
            ],
            [
                'name' => 'T. Hiddleston',
                'nrp' => '5026231001',
                'submitted' => 'November 3, 2024',
                'activity' => 'Soccer',
                'location' => 'Taman Alumni',
                'duration' => '2 Hours',
                'status' => 'Pending',
                'avatar' => 'imagesDetailLecturer/hiddleston.png',
                'proof' => 'imagesDetailLecturer/hiddlestonProof.png',
                'reviewer' => 'Aditya Zulkifli',
                'comment' => 'Your proof isn’t quite convincing yet. Kindly attach a clearer certificate for verification.',
            ],
            [
                'name' => 'A. Taylor',
                'nrp' => '5026231002',
                'submitted' => 'November 3, 2024',
                'activity' => 'Chess',
                'location' => 'Grand City',
                'duration' => '30 Minutes',
                'status' => 'Need Revision',
                'avatar' => 'imagesDetailLecturer/taylor.png',
                'proof' => 'imagesDetailLecturer/taylorProof.png',
                'reviewer' => 'Heru Susanto',
                'comment' => 'Photo proof looks good, but it’s missing timestamp. Please reupload one with date/time.',
            ],
            [
                'name' => 'S. Ohtani',
                'nrp' => '5026231003',
                'submitted' => 'December 5, 2024',
                'activity' => 'Baseball',
                'location' => 'Taman Alumni',
                'duration' => '1 Hour',
                'status' => 'Accepted',
                'avatar' => 'imagesDetailLecturer/ohtani.png',
                'proof' => 'imagesDetailLecturer/ohtaniProof.png',
                'reviewer' => null,
                'comment' => null,
            ],
            [
                'name' => 'S. Curry',
                'nrp' => '5026231004',
                'submitted' => 'December 6, 2024',
                'activity' => 'Basketball',
                'location' => 'Fasor ITS',
                'duration' => '1 Hour',
                'status' => 'Accepted',
                'avatar' => 'imagesDetailLecturer/curry.png',
                'proof' => 'imagesDetailLecturer/curryProof.png',
                'reviewer' => null,
                'comment' => null,
            ],
            [
                'name' => 'K. Middleton',
                'nrp' => '5026231005',
                'submitted' => 'December 11, 2024',
                'activity' => 'Tennis',
                'location' => 'Taman Alumni ITS',
                'duration' => '1 Hour',
                'status' => 'Rejected',
                'avatar' => 'imagesDetailLecturer/middleton.png', 
                'proof' => 'imagesDetailLecturer/middletonProof.png', 
                'reviewer' => 'Aditya Zulkifli',
                'comment' => 'You attached the wrong picture. Please make a new submission.',
            ],
            [
                'name' => 'Benedict',
                'nrp' => '5026231006',
                'submitted' => 'December 11, 2024',
                'activity' => 'Running',
                'location' => 'Pakuwon City',
                'duration' => '2 Hours',
                'status' => 'Accepted',
                'avatar' => 'imagesDetailLecturer/benedict.png',
                'proof' => 'imagesDetailLecturer/benedictProof.png',
                'reviewer' => 'Heru Susanto',
                'comment' => 'Good work!',
            ],
            [
                'name' => 'V. Beckham',
                'nrp' => '5026231007',
                'submitted' => 'December 11, 2024',
                'activity' => 'Gym',
                'location' => 'Gym Fasor',
                'duration' => '1.5 Hours',
                'status' => 'Accepted',
                'avatar' => 'imagesDetailLecturer/beckham.png',
                'proof' => 'imagesDetailLecturer/beckhamProof.png',
                'reviewer' => null,
                'comment' => null,
            ],
        ];

        $student = $students[$id] ?? $students[0];

        return view('lecturer.show', compact('student'));
    }
}
