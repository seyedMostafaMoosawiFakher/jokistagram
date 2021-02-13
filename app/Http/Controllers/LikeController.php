<?php

namespace App\Http\Controllers;

use App\Models\Joke;
use App\Models\Like;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LikeController extends Controller
{
    // لایک که یوزر را از اوث گرفته
    public function like( Joke $joke , User $user, $isLiked, request $request)
    {
        $urlForBack = $request->url;

//        اگر کاربر قبلا این جوک را لایک نکرده لایک می شود
        if ($isLiked == 0) {
            Like::create([
                'joke_id' => $joke->id,
                'user_id' => $user->id,
            ]);

        }
//        اگر بخواهیم در همان صفحه شو بماند می زنیم:
// این کار باعث می شود بتواند چند بار لایک کند. 
        // return redirect()->route('show', compact('joke'));

//        اگر بخواهیم به ایندکس برگردد می زنیم:
// return redirect()->route('index');

//    کار نکرد    اگر بخواهیم به صفحه قبلی که از آن آمده بر گردد:
//        return redirect()->back();

        return redirect($urlForBack);
}




        // لایک قبلی که با ریکئست یوزر را گرفته
    //     public function like(Request $request, Joke $joke, $isLiked)
    //     {
    // //        اگر کاربر قبلا این جوک را لایک نکرده لایک می شود
    //         if ($isLiked == 0) {
    //             Like::create([
    //                 'joke_id' => $joke->id,
    //                 'user_id' => $request->user_id,
    //             ]);
    
    //         }


    //        اگر بخواهیم در همان صفحه شو بماند می زنیم:
// این کار باعث می شود بتواند چند بار لایک کند. 
        // return redirect()->route('show', compact('joke'));

//        اگر بخواهیم به ایندکس برگردد می زنیم:
    //    return redirect()->route('index');

//    کار نکرد    اگر بخواهیم به صفحه قبلی که از آن آمده بر گردد:
//        return redirect()->back();
    // }







// دیسلایک کردن
    public function disLike(Joke $joke, User $user , $isLiked, request $request)
    {

        $urlForBack = $request->url;

        //        اگر کاربر قبلا این جوک را لایک کرده دیسلایک می شود
        if ($isLiked != 0) {
            // حذف همه سطور حاوی لایک که قاعدتا باید یکی باشد
            Like::where('joke_id', $joke->id)->where('user_id', $user->id)->delete();

            // فرستادن به روت اصلی
            // return redirect()->route('index');

            return redirect($urlForBack);

        }
    }






    
    //    نمایش جوکهای مورد علاقه و لایک شده یوزر
    public function likedJokes(user $user)
    {
    //     // اینها کار کرد و پیجینیت هم شد
            
    // از جدول لایکها، لایکهای این یوزر را می گیریم. 
    $likedJokesId = Like::where('user_id', '=', $user->id)
    ->get('joke_id');

    // از لایکها ای دی جوکها را می گیریم و بوسیله یک حلقه درون ارایه می ریزیم. 
        $array= [];
    foreach ($likedJokesId as $item) {
        array_unshift($array,$item->joke_id);
    }

    // با دستور ور این ، در جوکها ایدی های گرفته شده را پیدا می کنیم وبر می گردانیم و  پیجینیت می کنیم . 
    $jokes = Joke::whereIn('id',$array)->latest()->paginate(2);
 
    // به روت حاوی لینک برای صفحه بندی می فرستیم. 
    return view('layouts.index', compact('jokes'));

    }

    //     // اینها کار کرد ولی پیجینیت نشد
    // public function likedJokes(user $user)
    // {
        
    //     $likedJokesId = Like::where('user_id', '=', $user->id)
    //         ->get('joke_id');

    //         $array= [];
    //     foreach ($likedJokesId as $item) {
    //         array_unshift($array,$item->joke_id);
    //     }

    // با این روش نمی شود. باید از دستور ور این استفاده کرد. 
    //     $jokes = Joke::find($array);
        
    //     return view('layouts.myLikes', compact('jokes'));
  
    // }

}
