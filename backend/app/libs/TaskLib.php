<?php

namespace App\Libs;

use App\Core\Database;
use App\Core\JWTToken;

class TaskLib
{
    protected array $invalids = [];

    public function index()
    {
        $token = getToken();

        $jwt = isset($token) ? $token : "";

        requireJWT($jwt);

        $decoded = JWTToken::verify($jwt);

        $tasks = Database::table('tasks')->where('user_id', $decoded->id)->get();

        echo json_encode([
            'data' => $tasks
        ]);
        exit;
    }

    public function store()
    {
        $token = getToken();

        $jwt = isset($token) ? $token : "";

        requireJWT($jwt);

        $request = $_POST;

        $this->validate($request);

        $decoded = JWTToken::verify($jwt);

        $taskId = Database::table('tasks')->insert([
            'title' => $request['title'],
            'is_done' => 0,
            'user_id' => $decoded->id
        ]);

        http_response_code(201);
        echo json_encode([
            'message' => 'created',
            'data' => [
                'id' => $taskId,
                'title' => $request['title']
            ]
        ]);
        exit;
    }

    public function validate($fields)
    {
        if (!isset($fields['title']) or empty($fields['title'])) {
            $this->invalids['title'] = "title is required";
        }

        if (count($this->invalids) > 0) {
            $this->erorrs();
        }

        return true;
    }

    public function erorrs()
    {
        http_response_code(400);
        echo json_encode([
            'message' => 'Proccess faild',
            'data' => $this->invalids
        ]);
        exit;
    }

    public function destroy($id)
    {
        $token = getToken();

        $jwt = isset($token) ? $token : "";

        requireJWT($jwt);

        $decoded = JWTToken::verify($jwt);

        $task = Database::table('tasks')->where('id', $id)->single();

        if (!$task) {
            http_response_code(404);
            echo json_encode(["message" => "not found"]);
            exit;
        }

        if ($task->user_id != $decoded->id) {
            http_response_code(403);
            echo json_encode(["message" => "forbidden"]);
            exit;
        }

        Database::table('tasks')->where('id', $id)->delete();

        http_response_code(200);
        echo json_encode([
            'message' => 'deleted',
        ]);
        exit;
    }

    public function done($id)
    {
        $task = Database::table('tasks')->where('id', $id)->single();

        if (empty($task)) {
            http_response_code(404);
            exit(json_encode('not found'));
        }

        Database::table('tasks')->where('id', $id)->update([
            'is_done' => 1 - $task->is_done
        ]);

        http_response_code(200);
        echo json_encode([
            'message' => 'updated',
            'date' => [
                'task_done' => 1 - $task->is_done
            ]
        ]);
        exit;
    }
}
