@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="space-y-6">
    <!-- Welcome Section -->
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-l-4 border-[#04726d]">
        <div class="p-6 flex justify-between items-center">
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-1">Selamat Datang, {{ $user->name }}!</h2>
                <p class="text-gray-600">Dashboard Sistem Manajemen Akses</p>
            </div>
            <div class="hidden md:block">
                <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded border border-green-400">
                    {{ $user->role->name ?? 'User' }}
                </span>
            </div>
        </div>
    </div>

    <!-- Stats Overview -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Users Stat -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 flex items-center space-x-4 hover:shadow-md transition-shadow">
            <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                <i class="fas fa-users text-2xl"></i>
            </div>
            <div>
                <div class="text-gray-500 text-sm font-medium">Total Pengguna</div>
                <div class="text-2xl font-bold text-gray-900">{{ \App\Models\User::count() }}</div>
            </div>
        </div>
        
        <!-- Roles Stat -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 flex items-center space-x-4 hover:shadow-md transition-shadow">
            <div class="p-3 rounded-full bg-green-100 text-green-600">
                <i class="fas fa-user-shield text-2xl"></i>
            </div>
            <div>
                <div class="text-gray-500 text-sm font-medium">Total Role</div>
                <div class="text-2xl font-bold text-gray-900">{{ \App\Models\Role::count() }}</div>
            </div>
        </div>
        
        <!-- Permissions Stat -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 flex items-center space-x-4 hover:shadow-md transition-shadow">
            <div class="p-3 rounded-full bg-purple-100 text-purple-600">
                <i class="fas fa-key text-2xl"></i>
            </div>
            <div>
                <div class="text-gray-500 text-sm font-medium">Total Permission</div>
                <div class="text-2xl font-bold text-gray-900">{{ \App\Models\Permission::count() }}</div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Quick Actions Card -->
        <div class="lg:col-span-2 bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                    <i class="fas fa-bolt text-yellow-500 mr-2"></i> Aksi Cepat
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @if($user->hasPermission('manage_users'))
                    <a href="{{ route('users.index') }}" class="flex items-center p-4 bg-white border border-gray-200 rounded-xl hover:border-blue-500 hover:shadow-md transition-all group">
                        <div class="w-12 h-12 bg-blue-50 rounded-lg flex items-center justify-center mr-4 group-hover:bg-blue-600 transition-colors">
                            <i class="fas fa-users text-blue-600 group-hover:text-white transition-colors text-lg"></i>
                        </div>
                        <div>
                            <div class="text-gray-900 font-semibold group-hover:text-blue-600 transition-colors">Kelola Pengguna</div>
                            <div class="text-sm text-gray-500">Manajemen data pengguna</div>
                        </div>
                        <i class="fas fa-arrow-right ml-auto text-gray-300 group-hover:text-blue-500 transition-colors"></i>
                    </a>
                    @endif
                    
                    @if($user->hasPermission('manage_roles'))
                    <a href="{{ route('roles.index') }}" class="flex items-center p-4 bg-white border border-gray-200 rounded-xl hover:border-green-500 hover:shadow-md transition-all group">
                        <div class="w-12 h-12 bg-green-50 rounded-lg flex items-center justify-center mr-4 group-hover:bg-green-600 transition-colors">
                            <i class="fas fa-user-tag text-green-600 group-hover:text-white transition-colors text-lg"></i>
                        </div>
                        <div>
                            <div class="text-gray-900 font-semibold group-hover:text-green-600 transition-colors">Kelola Role</div>
                            <div class="text-sm text-gray-500">Manajemen role pengguna</div>
                        </div>
                        <i class="fas fa-arrow-right ml-auto text-gray-300 group-hover:text-green-500 transition-colors"></i>
                    </a>
                    @endif
                    
                    @if($user->hasPermission('manage_permissions'))
                    <a href="{{ route('permissions.index') }}" class="flex items-center p-4 bg-white border border-gray-200 rounded-xl hover:border-purple-500 hover:shadow-md transition-all group">
                        <div class="w-12 h-12 bg-purple-50 rounded-lg flex items-center justify-center mr-4 group-hover:bg-purple-600 transition-colors">
                            <i class="fas fa-key text-purple-600 group-hover:text-white transition-colors text-lg"></i>
                        </div>
                        <div>
                            <div class="text-gray-900 font-semibold group-hover:text-purple-600 transition-colors">Kelola Permission</div>
                            <div class="text-sm text-gray-500">Manajemen izin akses</div>
                        </div>
                        <i class="fas fa-arrow-right ml-auto text-gray-300 group-hover:text-purple-500 transition-colors"></i>
                    </a>
                    @endif
                </div>
            </div>
        </div>

        <!-- Recent Activity (Mockup) -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                    <i class="fas fa-history text-gray-400 mr-2"></i> Aktivitas Terkini
                </h3>
                <div class="space-y-4">
                    <!-- Item 1 -->
                    <div class="flex items-start space-x-3 pb-4 border-b border-gray-100 last:border-0">
                        <div class="w-2 h-2 mt-2 rounded-full bg-green-500"></div>
                        <div>
                            <p class="text-sm text-gray-800 font-medium">Login Berhasil</p>
                            <p class="text-xs text-gray-500">{{ now()->format('d M Y, H:i') }}</p>
                        </div>
                    </div>
                    <!-- Item 2 -->
                    <div class="flex items-start space-x-3 pb-4 border-b border-gray-100 last:border-0">
                         <div class="w-2 h-2 mt-2 rounded-full bg-blue-500"></div>
                        <div>
                            <p class="text-sm text-gray-800 font-medium">Update Profile</p>
                            <p class="text-xs text-gray-500">{{ now()->subHours(2)->format('d M Y, H:i') }}</p>
                        </div>
                    </div>
                     <!-- Item 3 -->
                    <div class="flex items-start space-x-3 pb-4 border-b border-gray-100 last:border-0">
                         <div class="w-2 h-2 mt-2 rounded-full bg-gray-300"></div>
                        <div>
                            <p class="text-sm text-gray-800 font-medium">System Check</p>
                            <p class="text-xs text-gray-500">{{ now()->subDays(1)->format('d M Y, H:i') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
