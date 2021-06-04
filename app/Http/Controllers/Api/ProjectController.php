<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\VideoWatch;
use Illuminate\Http\Request;
use Firebase\JWT\JWT;

class ProjectController extends Controller
{
    
    //Retorna o ID do usuário autenticado
    private function userID(Request $request) {
        $token = $request->bearerToken();
        $data = JWT::decode($token, config('jwt.key'), ['HS256']);
        return $data->id;
    }

    public function getAll(Request $request, int $categoryID = null) {
        $userID = $this->userID($request);

        //Projects
        $projectModel = Project::query();
        if ($categoryID) $projectModel = $projectModel->where('category_id', $categoryID);
        $projects = $projectModel->get()->toArray();
       
        foreach ($projects as $k => $p) {
            $totalWatched = 0;
            foreach ($p['videos'] as $k2 => $v) {
                $total = VideoWatch::where('user_id', $userID)->where('video_id', $v['id'])->count();
                $projects[$k]['videos'][$k2]['watched'] = ($total == 1);
                if ($total) $totalWatched++;
            }
            $projects[$k]['watched'] = $totalWatched;
        }

        return response()->json($projects, 200);
    }

    /** Busca um project especifico */
    public function get(Request $request, int $projectID) {
        $userID = $this->userID($request);

        //Projects
        $project = Project::find($projectID)->toArray();
       
        $totalWatched = 0;
        foreach ($project['videos'] as $k2 => $v) {
            $total = VideoWatch::where('user_id', $userID)->where('video_id', $v['id'])->count();
            $project['videos'][$k2]['watched'] = ($total == 1);
            if ($total) $totalWatched++;
        }
        $project['watched'] = $totalWatched;

        return response()->json($project, 200);
    }

    /** Marca se um vídeo foi vistou desvisto
    * @param $watch = 1 Ver | 0 = Desver 
    **/
    public function watch(Request $request, int $videoID,  int  $watch) {
        $userID = $this->userID($request);

        try {
            //Assistiu
            if ($watch == 1) {
                VideoWatch::create(['user_id' => $userID, 'video_id' => $videoID]);
                return response()->json('Vídeo assistido', 201);
            } else { //Desver
                VideoWatch::where('user_id', $userID)->where('video_id', $videoID)->delete();
                return response()->json('Vídeo removido', 200);
            }
        } catch(\Exception $e) {
            return response()->json('Não foi possível completar a ação', 500);
        }


    }
}
