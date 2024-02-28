<?php

namespace App\Http\Controllers\GOL;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\Admin\Users\UpdateUserLevel;

class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $users = User::where('level', '<>', 'admin')->paginate();
        $coordinators = User::where('level', 'coordinator')->get();

        return view('admin.users.index', compact('users', 'coordinators'));
    }

    public function update(User $user, UpdateUserLevel $request) {
        if ($request->level != 'seller') {
            $user->coordinator_id   =   null;
        } else {
            $user->coordinator_id   =   $request->coordinator_id;
        }

        $user->level = $request->level;
        $user->touch();

        if ($user->save()) {
            return redirect()->back()->with('success', 'Usuário atualizado com sucesso');
        }
        return redirect()->back()->with('error', 'Houve um erro ao editar o usuário');
    }

    public function delete(User $user) {
        if ($user->delete()) {
            return redirect()->back()->with('success', 'Usuário apagado com sucesso');
        }
        return redirect()->back()->with('error', 'Falha ao deletar o usuário');
    }
}
