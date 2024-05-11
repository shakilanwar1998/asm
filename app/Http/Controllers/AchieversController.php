<?php

namespace App\Http\Controllers;

use App\Models\Achiever;
use App\Models\Customization;
use Illuminate\Http\Request;

class AchieversController extends Controller
{
    public function getAll(Request $request)
    {
        $achievers = Achiever::select('name','position','photo','type')->join('members','achievers.member_id','=','members.id')->orderBy('position')->get();

        $tenMillions = array_values($achievers->where('type',1)->toArray());
        $fifteenMillions = array_values($achievers->where('type',2)->toArray());

        $settings = Customization::all();

        $tenMillionHeading = $settings->where('module_name','10_million_title')->value('value') ?? '2023 10 Million Gold Club Achievers';
        $fifteenMillionHeading = $settings->where('module_name','15_million_title')->value('value') ?? '2023 15 Million Diamond Club Achievers';

        $tenMillionLogo = $settings->where('module_name','10_million_logo')->value('value');
        $fifteenMillionLogo = $settings->where('module_name','15_million_title')->value('value');


        return response([
            'tenMillions' => $tenMillions,
            'fifteenMillions' => $fifteenMillions,
            'goldLogo' => $tenMillionLogo ? '/storage/'.$tenMillionLogo : '/img/10-million.png',
            'diamondLogo' => $fifteenMillionLogo ? '/storage/'.$fifteenMillionLogo : '/img/15-year-diamond.png',
            'goldTitle' => $tenMillionHeading,
            'diamondTitle' => $fifteenMillionHeading,
            'goldBackground' => asset('/img/Corporate-one-compress.mp4'),
            'diamondBackground' => asset('/img/Corporate-two-compress.mp4')
        ]);
    }
}
