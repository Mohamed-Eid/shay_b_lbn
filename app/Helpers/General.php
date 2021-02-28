<?php



function folder_path($path){
    if (!file_exists($path)) {
        mkdir($path, 0777, true);
    }
}

function get_video_id($link){
    preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $link, $match);
    return $match[1];
}

/**
 * Store a newly created resource in storage.
 *
 * @param  string $path folder name in public
 * @param  $request->image
 * @return string name
 */
function upload_image($path , $image , $width=300 , $height=null)
{
    $path = 'uploads/'.$path ;
    folder_path($path);
    // $image must be a $request->image 
    Intervention\Image\Facades\Image::make($image)->resize($width, $height, function ($constraint) {
        $constraint->aspectRatio();
    })
        ->save(public_path($path.'/'. $image->hashName()));
    return $image->hashName();
}

function upload_image_without_resize($path , $image )
{
    $path = 'uploads/'.$path ;
    folder_path($path);
    // $image must be a $request->image 
    Intervention\Image\Facades\Image::make($image)->save(public_path($path .'/'. $image->hashName()));
    return $image->hashName();
}

function delete_image($folder , $image)
{
    Illuminate\Support\Facades\Storage::disk('public_uploads')->delete('/'.$folder.'/' . $image);
}


function upload_file($path, $request_file){
    $path = 'uploads/'.$path ;
    folder_path($path);
    
    $fileName = rand().time().'.'.$request_file->getClientOriginalExtension();
    $request_file->move(public_path($path), $fileName);
    return $fileName;
}


function upload_image_base64($path , $image , $width=300 , $height=null)
{
    $path = 'uploads/'.$path ;
    folder_path($path);
    // $image must be a $request->image 
    $name = mt_rand().time().'.png';
    Intervention\Image\Facades\Image::make($image)->resize($width, $height, function ($constraint) {
        $constraint->aspectRatio();
    })
        ->save(public_path($path .'/'. $name));
    return  $name;
}

// function get_settings_by_class($class){
//     return \App\Setting::where('class',$class)->get();
// }

function get_setting_by_key($key){
    return \App\Setting::where('key',$key)->first();
}

function input_has_error($field , $errors){

    return $errors->has($field) ? 'is-invalid' : '';
}


function discount($price,$discount)
{
    return $price - $price*($discount/100);
}





function is_current_route($route){
    if(request()->route()->getName() == $route)
        return true;
    return false;
}

function is_active($route){
    return is_current_route($route) ? 'active' : '';
}

function is_admin_active($route){
    return is_current_route($route) ? 'kt-menu__item--active' : '';
}


function process_videos(Illuminate\Http\Request $request){
    $data = [];
    foreach ($request->videos as $key => $video) {
        $data[$key]['ar']['name'] = $video['ar_name'];
        $data[$key]['en']['name'] = $video['en_name'];
        $data[$key]['url']        = $video['url'];
    }
    return $data;
}


?>