<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class LiveSearchController extends Controller
{


    public function index(){
        dd("hi index");
    }


    public function search(Request $request)
    {
        $usersOutput = null;

        if($request->ajax())
        {
            $searchFor = $request->get('query');
            $users = null;

            if($searchFor != '')
            {

                $users = DB::table('users')
                    ->where('first_name', 'like', '%'.$searchFor.'%')
                    ->orWhere('second_name', 'like', '%'.$searchFor.'%')
                    ->orderBy('id', 'desc')
                    ->get();
            }
            else
            {

            }

            $total_users_num = $users->count();

            if($total_users_num > 0)
            {
                foreach($users as $user)
                {

                    $usersOutput .= '
                                    <tr>
                                        <td><img src="/storage/uploads/profile_pictures/'.User::findorfail($user->id)->profile_picture.'" alt="" class="user-nav__user-photo"></td>
                                        <td>'.User::findorfail($user->id)->full_name().'</td>
                                        <td><a class="btn btn-success" href="/users/'.$user->id.'">View</a></td>
                                    </tr>
                                ';

                }

            }
            else
            {
                $usersOutput = '
                           <tr>
                                <td align="center" colspan="5">No Data Found</td>
                           </tr>
                           ';
            }









            $tracks = null;
            if($searchFor != '')
            {
                $tracks = DB::table('tracks')
                    ->where('file_name', 'like', '%'.$searchFor.'%')
                    ->orderBy('id', 'desc')
                    ->get();
            }
            else
            {

            }

            $total_tracks_num = $tracks->count();
            $tracksOutput = null;
            if($total_tracks_num > 0)
            {
                foreach($tracks as $track)
                {

                    $tracksOutput .= '
                                <tr>
                                 <td>'.$track->file_name.'</td>
                                  <td><a class="btn btn-success" href="/tracks/'.$track->id.'">View</a></td>
                                </tr>
                                ';

                }

            }
            else
            {
                $tracksOutput = '
                           <tr>
                                <td align="center" colspan="5">No Data Found</td>
                           </tr>
                           ';
            }
            $data = array(
                'table_users_data'  => $usersOutput,
                'total_users_num'  => $total_users_num,
                'table_tracks_data'  => $tracksOutput,
                'total_tracks_num'  => $total_tracks_num,
            );

            echo json_encode($data);
//            echo $output;
        }else{

        }
    }
}
