<?php 
$users = DB::table('users')->get();
$roles = DB::table('roles')->get();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="build/assets/css/admindashboard.css">
</head>
<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Admin Dashboard') }}
            </h2>
        </x-slot>
    
        <div class="page">
            <div class="sidebar">
                    <ul class="sidebar_buttons">
                        <li>
                            <button id="rolesbutton" class="btn">Roles</button>
                        </li>
                        <li>
                            <button id="latestnewsbutton" class="btn">Latest News</button>
                        </li>
                        <li>
                            <button id="faqbutton" class="btn">FAQ</button>
                        </li>
                    </ul>
            </div>
            <div id="roles" class="padding contentRoles">
                <table>
                    <tr>
                        <th>User</th>
                        <th>Role</th>
                    </tr>
                
                @foreach($users as $user)
                <?php $user_role = DB::table('user_roles')->where('user_id', $user->id)->first(); ?>
                <tr>
                    <th>
                {{$user -> name}}
                    </th>
                     <th>
                        <form id="roleForm" method="PUT" action="{{url('user_roles')}}">
                            <select id="roles" name="role_id" onchange="document.getElementById('roleForm').submit()">
                                @foreach($roles as $role)
                                    @if($role->id != $user_role->role_id)
                                        <option>{{$role->id}}</option>
                                    @endif
                                    @if($role->id == $user_role->role_id)
                                        <option selected>{{$user_role -> role_id}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </form>
                
                    </th>
                </tr>
                @endforeach


                </table>
            </div>
            <div id="latestnews" class="padding contentLatestnews hidden">
                latestnews
            </div>
            <div id="FAQ" class="padding contentFaq hidden">
            </div>
        </div>
    </x-app-layout>
    <script src="build/assets/js/admindashboard.js"></script>
</body>
</html>
