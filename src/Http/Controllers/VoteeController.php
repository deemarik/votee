<?php

namespace Laravolt\Votee\Http\Controllers;

use Laravolt\Votee\Exceptions\UnauthenticatedException;
use Votee;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class VoteeController extends Controller
{

    public function up(Request $request)
    {
        try {
            $class = $request->get('type');
            $model = with(new $class)->findOrFail($request->get('id'));
            $vote = Votee::voteUp($model);
            $data['data'] = [
                'value'      => $vote['value'],
                'vote_up'   => $vote['vote_up'],
                'vote_down' => $vote['vote_down'],
            ];

        }
        catch(UnauthenticatedException $e) {
            return response()->json(['status' => $e->getCode(), 'error' => $e->getMessage(), 'message' => trans('votee::votee.unauthenticated')], $e->getCode());
        }
        catch (\Exception $e) {
            return response()->json(['status' => $e->getCode(), 'error' => $e->getMessage(), 'message' => $e->getMessage()], $e->getCode());
        }

        return response()->json($data);
    }

    public function down(Request $request)
    {
        try {
            $class = $request->get('type');
            $model = with(new $class)->findOrFail($request->get('id'));
            $vote = Votee::voteDown($model);
            $data['data'] = [
                'value'      => $vote['value'],
                'vote_up'   => $vote['vote_up'],
                'vote_down' => $vote['vote_down'],
            ];

        }
        catch(UnauthenticatedException $e) {
            return response()->json(['status' => $e->getCode(), 'error' => $e->getMessage(), 'message' => trans('votee::votee.unauthenticated')], $e->getCode());
        }
        catch (\Exception $e) {
            return response()->json(['status' => $e->getCode(), 'error' => $e->getMessage(), 'message' => $e->getMessage()], $e->getCode());
        }


        return response()->json($data);
    }

}
