<?php

namespace App\Http\Controllers;

use App\Models\Joke;
use App\Models\Like;
use App\Models\User;
use Illuminate\Http\Request;

class JokeController extends Controller
{




//   نمایش همه جوکهای سایت به صورت صفحه بندی شده در صفحه اصلی سایت
    public function index()
    {
        $jokes = Joke::latest()->paginate(12);
        return view('layouts.index', compact('jokes'));
    }




//   نمایش یک جوک اگر کاربر لاگین نکرده باشد
    public function show(Joke $joke, Request $request)
    {
//        تعداد لایکهای این پست
        $count = $joke->likes->count();

//چون کاربر لاگین نکرده ، پس لایک هم نکرده
        $isLiked = 0;

        $urlForBack = $request->url;

        return view('layouts.show', compact(['joke', 'count', 'isLiked','urlForBack']));
    }




    
//    اگر کاربر لاکین کرده باشد
    public function showWithUser(Joke $joke, Request $request)
    {
        // dd($request->user , $request->user->id );
        
//        تعداد لایکهای این پست
        $count = $joke->likes->count();

    //        ایا کاربر لایک کرده؟
        $isLiked = Like::where('joke_id', $joke->id)->where('user_id', $request->user)->count();


        $urlForBack = $request->url;

    // روت مقصد.
        return view('layouts.show', compact(['joke', 'count', 'isLiked','urlForBack']));
    }

//   نمایش ویو برای ساختن جوک جدید
    public function create()
    {
        return view('layouts.create');
    }
//ساختن جوک جدید با اعتبار سنجی و پیغام الرت سویت
    public function store(Request $request)
    {
//        اعتبار سنجی
        $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

//ساختن جوک جدید در دیتا بیس
        Joke::create([
            'title' => $request->title,
            'body' => $request->body,
            'status' => 1,
            'user_id' => $request->user_id,
        ]);

//        پیغام ساخته شدن جوک بوسیله کتابخانه سویت الرت
        alert()->success('جوک جدید اضافه شد.', 'عملیات موفقیت آمیز')->autoclose(1500);
        return redirect()->route('index');
    }

//    حذف جوک از دیتا بیس به همراه الرت سویت
    public function delete(Joke $joke, request $request)
    {
        $urlForBack = $request->url;
//        حذف جوک از دیتا بیس
        $joke->delete();

//        نمایش الرت پیغام
        alert()->error('جوک حذف شد.', 'عملیات موفقیت آمیز')->autoclose(1500);

        // return redirect()->route('index');
        return redirect($urlForBack);
    }

//نمایش ویوی مناسب برای ادیت جوک
    public function edit(Joke $joke, request $request)
    {
        $urlForBack = $request->url;
        return view('layouts.edit', compact('joke','urlForBack'));
    }
    
    //    ادیت کردن جوک با اعتبار سنجی و پیغام سویت الرت
    public function update(Request $request, Joke $joke)
    {
        $urlForBack = $request->url;
//        اعتبار سنجی داده های دریافتی از کاربر
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

//        آپدیت کردن جوک در دیتا بیس
        $joke->update(['title' => $request->title, 'body' => $request->body]);

//        نمایش پیغام حذف جوک بوسیله الرت سویت
        alert()->basic('جوک ویرایش شد.', 'عملیات موفقیت آمیز')->autoclose(1500);

        return redirect($urlForBack);

    }

//    نمایش جوکهای خود یوزر
    public function userJokes(user $user)
    {
        $jokes = Joke::where('user_id', '=', $user->id)->latest()->paginate(3);

//اگر نخواهیم از فساد استفاده کنیم چه؟ دستور زیر کار نکرد و اشتباه است.
//        $jokes = $user->jokes->all()->paginate(12);
// از دی بی دو نقطه دو نقطه تیبل... باید استفاده کرد. 


        return view('layouts.index', compact('jokes'));
    }

//    نمایش لیست افراد لایک کننده
// خواهم زد. 
}
