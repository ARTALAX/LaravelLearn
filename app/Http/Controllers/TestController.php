<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class TestController extends Controller
{
    public function index(): View
    {

        //        $users = DB::table('users')->get();
        //        $users = DB::table('users')->first(['name']);
        //        //        $users = DB::table('users')->value('name');
        //        $users = DB::table('users')->orderByDesc('id')->get();
        //        $users = DB::table('users')->find(6, ['id', 'name', 'password']);
        //        $users = DB::table('users')->pluck('name', 'email');
        //        $users = DB::table('users')
        //            ->where('ID', '>', '3')
        //            ->where('ID', '<', '6')
        //            ->get();
        //        $users = DB::table('users')->where([['ID', '>', '3'], ['ID', '<', '6']])->get();

        //        $users = DB::table('users')->count();
        //        $users = DB::table('users')->max('password');
        //        $users = DB::table('users')->whereIn('ID', [4, 5, 6])->get();
        //        $cities = DB::table('city')->limit(100)->get();
        //        $cities = DB::table('city')
        //            ->select('city.id', 'city.name', 'city.countryCode', 'country.population', 'country.name as countryName')
        //            ->leftJoin('country', 'city.countryCode', '=', 'country.code')
        //            ->having('country.population', '>', 100_000_000)
        //            ->get();
        //        dd($cities);

        //        $users = DB::select('select id,name,email from users where id=?', [1]);
        //
        //        //        $cnt = DB::scalar('select count(*) as cnt from users');
        //
        //        try {
        //            DB::transaction(function () {
        //                DB::insert(
        //                    'insert into users (name, email, password) values (?, ?, ?)',
        //                    ['d\'Arc', 'darc@gil.com', 666]
        //                );
        //                DB::insert(
        //                    'insert into users (name, email, password) values (?, ?, ?)',
        //                    ['d\'Arc', 'darc@gil.com', 666]
        //                );
        //            });
        //        } catch (\Exception $e) {
        //            dd($e->getMessage());
        //        }
        //
        //        //        dd(DB::update('update users set created_at=NOW(), updated_at=?', [date('Y-m-d H:i:s')]));
        //        //        DB::delete('delete from users   where id=?', [2]);
        //
        //        return view('hello', compact('users'));
    }
}
