<!DOCTYPE html>
<html lang="en" class="transition-colors duration-300">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Admin Dashboard')</title>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="{{ asset('admin-assets/css/style.css') }}">
  @yield('css')
</head>
<body class="bg-gray-100 text-gray-900">

  <div class="flex min-h-screen" x-data="{ collapsed: false }">

    <!-- Sidebar -->
    <aside 
      id="sidebar" 
      :class="collapsed ? 'w-20' : 'w-64'" 
      class="bg-[rgb(26,32,53)] flex-shrink-0 transition-all duration-300"
    >
      <div class="p-6 flex items-center justify-between border-b border-gray-700">
        <img
          src="{{ asset('assets/images/aviation/logo1.png') }}"
          alt="Logo"
          class="h-14 w-auto transition-all duration-300"
          x-show="!collapsed"
        >
        <img
          src="{{ asset('assets/images/aviation/logo1.png') }}"
          alt="Logo"
          class="h-10 w-10 rounded"
          x-show="collapsed"
        >
      </div>

      <!-- Sidebar Nav -->
      <nav class="mt-6 space-y-1 text-white">
        <a href="{{ route('admin.dashboard') }}" class="flex items-center py-2.5 px-6 rounded text-md space-x-3 group">
          <i class="fa-solid fa-gauge group-hover:text-indigo-400"></i>
          <span x-show="!collapsed">Dashboard</span>
        </a>
        <!-- Employees Dropdown -->
        <div x-data="{ open: false }">
          <button 
            @click="open=!open"
            class="w-full flex items-center justify-between py-2.5 px-6 rounded group">
            <div class="flex items-center space-x-3">
              <i class="fa-solid fa-users group-hover:text-indigo-400"></i>
              <span x-show="!collapsed">Employees</span>
            </div>
            <svg 
              :class="{'rotate-180': open}" 
              x-show="!collapsed"
              class="w-4 h-4 transform transition-transform duration-300"
              fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M19 9l-7 7-7-7" />
            </svg>
          </button>
          <div x-show="open && !collapsed" x-cloak class="ml-8 mt-1 border-l border-gray-600 pl-4 space-y-1">
            <a href="{{route('employees.index')}}" class="block py-2 text-sm text-gray-300 hover:text-indigo-400 flex items-center">
              <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-2"></span> All Employees
            </a>
            <a href="{{route('employees.create')}}" class="block py-2 text-sm text-gray-300 hover:text-indigo-400 flex items-center">
              <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-2"></span> Add Employee
            </a>
          </div>
        </div>
        <!-- Roles Dropdown -->
        <div x-data="{ open: false }">
          <button 
            @click="open=!open"
            class="w-full flex items-center justify-between py-2.5 px-6 rounded group">
            <div class="flex items-center space-x-3">
              <i class="fa-solid fa-user-shield group-hover:text-indigo-400"></i>
              <span x-show="!collapsed">Roles</span>
            </div>
            <svg 
              :class="{'rotate-180': open}" 
              x-show="!collapsed"
              class="w-4 h-4 transform transition-transform duration-300"
              fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M19 9l-7 7-7-7" />
            </svg>
          </button>
          <div x-show="open && !collapsed" x-cloak class="ml-8 mt-1 border-l border-gray-600 pl-4 space-y-1">
            <a href="{{route('roles.index')}}" class="block py-2 text-sm text-gray-300 hover:text-indigo-400 flex items-center">
              <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-2"></span> View Roles
            </a>
            <a href="{{route('roles.create')}}" class="block py-2 text-sm text-gray-300 hover:text-indigo-400 flex items-center">
              <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-2"></span> Add Roles
            </a>
          </div>
        </div>
        <!-- Permissions Dropdown -->
        <div x-data="{ open: false }">
          <button 
            @click="open=!open"
            class="w-full flex items-center justify-between py-2.5 px-6 rounded group"
          >
            <div class="flex items-center space-x-3">
              <i class="fa-solid fa-key group-hover:text-indigo-400"></i>
              <span x-show="!collapsed">Permissions</span>
            </div>
            <svg 
              :class="{'rotate-180': open}" 
              x-show="!collapsed"
              class="w-4 h-4 transform transition-transform duration-300"
              fill="none" stroke="currentColor" viewBox="0 0 24 24"
            >
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M19 9l-7 7-7-7" />
            </svg>
          </button>
          <div x-show="open && !collapsed" x-cloak class="ml-8 mt-1 border-l border-gray-600 pl-4 space-y-1">
            <a href="{{route('permissions.index')}}" class="block py-2 text-sm text-gray-300 hover:text-indigo-400 flex items-center">
              <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-2"></span> View Permissions
            </a>
            <a href="{{route('permissions.create')}}" class="block py-2 text-sm text-gray-300 hover:text-indigo-400 flex items-center">
              <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-2"></span> Add Permissions
            </a>
          </div>
        </div>
        <!-- Role Permissions -->
        <a href="{{route('role-permissions.index')}}" class="flex items-center py-2.5 px-6 rounded text-md space-x-3 group">
          <i class="fa-solid fa-lock group-hover:text-indigo-400"></i>
          <span x-show="!collapsed">Role-Permissions</span>
        </a>
        <!-- About Section Dropdown -->
        <div x-data="{ open: false }">
          <button 
            @click="open=!open"
            class="w-full flex items-center justify-between py-2.5 px-6 rounded group">
            <div class="flex items-center space-x-3">
              <i class="fa-solid fa-key group-hover:text-indigo-400"></i>
              <span x-show="!collapsed"> About Us</span>
            </div>
            <svg 
              :class="{'rotate-180': open}" 
              x-show="!collapsed"
              class="w-4 h-4 transform transition-transform duration-300"
              fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M19 9l-7 7-7-7" />
            </svg>
          </button>
          <div x-show="open && !collapsed" x-cloak class="ml-8 mt-1 border-l border-gray-600 pl-4 space-y-1" >
            <a href="{{route('about.index')}}" class="block py-2 text-sm text-gray-300 hover:text-indigo-400 flex items-center">
              <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-2"></span> View About us
            </a>
            <a href="{{route('about.create')}}" class="block py-2 text-sm text-gray-300 hover:text-indigo-400 flex items-center">
              <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-2"></span> Add About us
            </a>
          </div>
        </div>
        <!-- Highlight Section Dropdown -->
        <div x-data="{ open: false }">
          <button 
            @click="open=!open"
            class="w-full flex items-center justify-between py-2.5 px-6 rounded group">
            <div class="flex items-center space-x-3">
              <i class="fa-solid fa-key group-hover:text-indigo-400"></i>
              <span x-show="!collapsed"> Highlights
              </span>
            </div>
            <svg 
              :class="{'rotate-180': open}" 
              x-show="!collapsed"
              class="w-4 h-4 transform transition-transform duration-300"
              fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M19 9l-7 7-7-7" />
            </svg>
          </button>
          <div x-show="open && !collapsed" x-cloak class="ml-8 mt-1 border-l border-gray-600 pl-4 space-y-1" >
            <a href="{{route('highlights.index')}}" class="block py-2 text-sm text-gray-300 hover:text-indigo-400 flex items-center">
              <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-2"></span> View highlight
            </a>
            <a href="{{route('highlights.create')}}" class="block py-2 text-sm text-gray-300 hover:text-indigo-400 flex items-center">
              <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-2"></span> Add highlight
            </a>
          </div>
        </div>
        <!-- Courses Section Dropdown -->
        <div x-data="{ open: false }">
          <button
            @click="open=!open"
            class="w-full flex items-center justify-between py-2.5 px-6 rounded group">
            <div class="flex items-center space-x-3">
              <i class="fa-solid fa-graduation-cap group-hover:text-indigo-400"></i>
              <span x-show="!collapsed"> Courses
              </span>
            </div>
            <svg
              :class="{'rotate-180': open}"
              x-show="!collapsed"
              class="w-4 h-4 transform transition-transform duration-300"
              fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M19 9l-7 7-7-7" />
            </svg>
          </button>
          <div
            x-show="open && !collapsed"
            x-cloak
            class="ml-8 mt-1 border-l border-gray-600 pl-4 space-y-1" >
            <a href="{{route('courses.index')}}" class="block py-2 text-sm text-gray-300 hover:text-indigo-400 flex items-center">
              <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-2"></span> View Course
            </a>
            <a href="{{route('courses.create')}}" class="block py-2 text-sm text-gray-300 hover:text-indigo-400 flex items-center">
              <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-2"></span> Add Course
            </a>
          </div>
        </div>
        <!-- Course Phases Section Dropdown -->
        <div x-data="{ open: false }">
          <button
            @click="open=!open"
            class="w-full flex items-center justify-between py-2.5 px-6 rounded group">
            <div class="flex items-center space-x-3">
              <i class="fa-solid fa-layer-group group-hover:text-indigo-400"></i>
              <span x-show="!collapsed"> Course Phases
              </span>
            </div>
            <svg
              :class="{'rotate-180': open}"
              x-show="!collapsed"
              class="w-4 h-4 transform transition-transform duration-300"
              fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M19 9l-7 7-7-7" />
            </svg>
          </button>
          <div
            x-show="open && !collapsed"
            x-cloak
            class="ml-8 mt-1 border-l border-gray-600 pl-4 space-y-1" >
            <a href="{{route('course_phases.index')}}" class="block py-2 text-sm text-gray-300 hover:text-indigo-400 flex items-center">
              <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-2"></span> View Course Phases
            </a>
            <a href="{{route('course_phases.create')}}" class="block py-2 text-sm text-gray-300 hover:text-indigo-400 flex items-center">
              <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-2"></span> Add Course Phase
            </a>
          </div>
        </div>
        <!-- Course Eligibilities Section Dropdown -->
        <div x-data="{ open: false }">
          <button
            @click="open=!open"
            class="w-full flex items-center justify-between py-2.5 px-6 rounded group">
            <div class="flex items-center space-x-3">
              <i class="fa-solid fa-check-circle group-hover:text-indigo-400"></i>
              <span x-show="!collapsed"> Course Eligibilities
              </span>
            </div>
            <svg
              :class="{'rotate-180': open}"
              x-show="!collapsed"
              class="w-4 h-4 transform transition-transform duration-300"
              fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M19 9l-7 7-7-7" />
            </svg>
          </button>
          <div x-show="open && !collapsed" x-cloak class="ml-8 mt-1 border-l border-gray-600 pl-4 space-y-1">
            <a href="{{route('course_eligibilities.index')}}" class="block py-2 text-sm text-gray-300 hover:text-indigo-400 flex items-center">
              <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-2"></span> View Course Eligibilities
            </a>
            <a href="{{route('course_eligibilities.create')}}" class="block py-2 text-sm text-gray-300 hover:text-indigo-400 flex items-center">
              <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-2"></span> Add Course Eligibility
            </a>
          </div>
        </div>
        <!-- Selection Processes Section Dropdown -->
        <div x-data="{ open: false }">
          <button
            @click="open=!open"
            class="w-full flex items-center justify-between py-2.5 px-6 rounded group">
            <div class="flex items-center space-x-3">
              <i class="fa-solid fa-clipboard-list group-hover:text-indigo-400"></i>
              <span x-show="!collapsed"> Selection Processes
              </span>
            </div>
            <svg
              :class="{'rotate-180': open}"
              x-show="!collapsed"
              class="w-4 h-4 transform transition-transform duration-300"
              fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M19 9l-7 7-7-7" />
            </svg>
          </button>
          <div x-show="open && !collapsed" x-cloak class="ml-8 mt-1 border-l border-gray-600 pl-4 space-y-1">
            <a href="{{route('selection_processes.index')}}" class="block py-2 text-sm text-gray-300 hover:text-indigo-400 flex items-center">
              <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-2"></span> View Selection Processes
            </a>
            <a href="{{route('selection_processes.create')}}" class="block py-2 text-sm text-gray-300 hover:text-indigo-400 flex items-center">
              <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-2"></span> Add Selection Process
            </a>
          </div>
        </div>
        <!-- Facilities Section Dropdown -->
        <div x-data="{ open: false }">
          <button
            @click="open=!open"
            class="w-full flex items-center justify-between py-2.5 px-6 rounded group">
            <div class="flex items-center space-x-3">
              <i class="fa-solid fa-building group-hover:text-indigo-400"></i>
              <span x-show="!collapsed"> Facilities
              </span>
            </div>
            <svg
              :class="{'rotate-180': open}"
              x-show="!collapsed"
              class="w-4 h-4 transform transition-transform duration-300"
              fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M19 9l-7 7-7-7" />
            </svg>
          </button>
          <div x-show="open && !collapsed" x-cloak class="ml-8 mt-1 border-l border-gray-600 pl-4 space-y-1">
            <a href="{{route('facilities.index')}}" class="block py-2 text-sm text-gray-300 hover:text-indigo-400 flex items-center">
              <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-2"></span> View Facilities
            </a>
            <a href="{{route('facilities.create')}}" class="block py-2 text-sm text-gray-300 hover:text-indigo-400 flex items-center">
              <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-2"></span> Add Facility
            </a>
          </div>
        </div>
        <!-- Careers Section Dropdown -->
        <div x-data="{ open: false }">
          <button
            @click="open=!open"
            class="w-full flex items-center justify-between py-2.5 px-6 rounded group">
            <div class="flex items-center space-x-3">
              <i class="fa-solid fa-briefcase group-hover:text-indigo-400"></i>
              <span x-show="!collapsed"> Careers
              </span>
            </div>
            <svg
              :class="{'rotate-180': open}"
              x-show="!collapsed"
              class="w-4 h-4 transform transition-transform duration-300"
              fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M19 9l-7 7-7-7" />
            </svg>
          </button>
          <div x-show="open && !collapsed" x-cloak class="ml-8 mt-1 border-l border-gray-600 pl-4 space-y-1">
            <a href="{{route('careers.index')}}" class="block py-2 text-sm text-gray-300 hover:text-indigo-400 flex items-center">
              <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-2"></span> View Careers
            </a>
            <a href="{{route('careers.create')}}" class="block py-2 text-sm text-gray-300 hover:text-indigo-400 flex items-center">
              <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-2"></span> Add Career
            </a>
          </div>
        </div>

        <!-- Employees Dropdown -->
        <div x-data="{ open: false }">
          <button 
            @click="open=!open"
            class="w-full flex items-center justify-between py-2.5 px-6 rounded group">
            <div class="flex items-center space-x-3">
              <i class="fa-solid fa-users group-hover:text-indigo-400"></i>
              <span x-show="!collapsed">Employees</span>
            </div>
            <svg 
              :class="{'rotate-180': open}" 
              x-show="!collapsed"
              class="w-4 h-4 transform transition-transform duration-300"
              fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M19 9l-7 7-7-7" />
            </svg>
          </button>
          <div 
            x-show="open && !collapsed" 
            x-cloak 
            class="ml-8 mt-1 border-l border-gray-600 pl-4 space-y-1">
            <a href="{{route('employees.index')}}" class="block py-2 text-sm text-gray-300 hover:text-indigo-400 flex items-center">
              <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-2"></span> All Employees
            </a>
            <a href="{{route('employees.create')}}" class="block py-2 text-sm text-gray-300 hover:text-indigo-400 flex items-center">
              <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-2"></span> Add Employee
            </a>
          </div>
        </div>

        <!-- Roles Dropdown -->
        <div x-data="{ open: false }">
          <button 
            @click="open=!open"
            class="w-full flex items-center justify-between py-2.5 px-6 rounded group">
            <div class="flex items-center space-x-3">
              <i class="fa-solid fa-user-shield group-hover:text-indigo-400"></i>
              <span x-show="!collapsed">Roles</span>
            </div>
            <svg 
              :class="{'rotate-180': open}" 
              x-show="!collapsed"
              class="w-4 h-4 transform transition-transform duration-300"
              fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M19 9l-7 7-7-7" />
            </svg>
          </button>
          <div 
            x-show="open && !collapsed" 
            x-cloak 
            class="ml-8 mt-1 border-l border-gray-600 pl-4 space-y-1">
            <a href="{{route('roles.index')}}" class="block py-2 text-sm text-gray-300 hover:text-indigo-400 flex items-center">
              <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-2"></span> View Roles
            </a>
            <a href="{{route('roles.create')}}" class="block py-2 text-sm text-gray-300 hover:text-indigo-400 flex items-center">
              <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-2"></span> Add Roles
            </a>
          </div>
        </div>

        <!-- Permissions Dropdown -->
        <div x-data="{ open: false }">
          <button 
            @click="open=!open"
            class="w-full flex items-center justify-between py-2.5 px-6 rounded group"
          >
            <div class="flex items-center space-x-3">
              <i class="fa-solid fa-key group-hover:text-indigo-400"></i>
              <span x-show="!collapsed">Permissions</span>
            </div>
            <svg 
              :class="{'rotate-180': open}" 
              x-show="!collapsed"
              class="w-4 h-4 transform transition-transform duration-300"
              fill="none" stroke="currentColor" viewBox="0 0 24 24"
            >
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M19 9l-7 7-7-7" />
            </svg>
          </button>
          <div 
            x-show="open && !collapsed" 
            x-cloak 
            class="ml-8 mt-1 border-l border-gray-600 pl-4 space-y-1"
          >
            <a href="{{route('permissions.index')}}" class="block py-2 text-sm text-gray-300 hover:text-indigo-400 flex items-center">
              <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-2"></span> View Permissions
            </a>
            <a href="{{route('permissions.create')}}" class="block py-2 text-sm text-gray-300 hover:text-indigo-400 flex items-center">
              <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-2"></span> Add Permissions
            </a>
          </div>
        </div>

        <!-- Role Permissions -->
        <a href="{{route('role-permissions.index')}}" class="flex items-center py-2.5 px-6 rounded text-md space-x-3 group">
          <i class="fa-solid fa-lock group-hover:text-indigo-400"></i>
          <span x-show="!collapsed">Role-Permissions</span>
        </a>

        <!-- About Section Dropdown -->
        <div x-data="{ open: false }">
          <button 
            @click="open=!open"
            class="w-full flex items-center justify-between py-2.5 px-6 rounded group">
            <div class="flex items-center space-x-3">
              <i class="fa-solid fa-key group-hover:text-indigo-400"></i>
              <span x-show="!collapsed"> About Us</span>
            </div>
            <svg 
              :class="{'rotate-180': open}" 
              x-show="!collapsed"
              class="w-4 h-4 transform transition-transform duration-300"
              fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M19 9l-7 7-7-7" />
            </svg>
          </button>
          <div 
            x-show="open && !collapsed" 
            x-cloak 
            class="ml-8 mt-1 border-l border-gray-600 pl-4 space-y-1" >
            <a href="{{route('about.index')}}" class="block py-2 text-sm text-gray-300 hover:text-indigo-400 flex items-center">
              <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-2"></span> View About us
            </a>
            <a href="{{route('about.create')}}" class="block py-2 text-sm text-gray-300 hover:text-indigo-400 flex items-center">
              <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-2"></span> Add About us
            </a>
          </div>
        </div>

        <!-- Highlight Section Dropdown -->
        <div x-data="{ open: false }">
          <button 
            @click="open=!open"
            class="w-full flex items-center justify-between py-2.5 px-6 rounded group">
            <div class="flex items-center space-x-3">
              <i class="fa-solid fa-key group-hover:text-indigo-400"></i>
              <span x-show="!collapsed"> Highlights
              </span>
            </div>
            <svg 
              :class="{'rotate-180': open}" 
              x-show="!collapsed"
              class="w-4 h-4 transform transition-transform duration-300"
              fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M19 9l-7 7-7-7" />
            </svg>
          </button>
          <div 
            x-show="open && !collapsed" 
            x-cloak 
            class="ml-8 mt-1 border-l border-gray-600 pl-4 space-y-1" >
            <a href="{{route('highlights.index')}}" class="block py-2 text-sm text-gray-300 hover:text-indigo-400 flex items-center">
              <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-2"></span> View highlight
            </a>
            <a href="{{route('highlights.create')}}" class="block py-2 text-sm text-gray-300 hover:text-indigo-400 flex items-center">
              <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-2"></span> Add highlight
            </a>
          </div>
        </div>

        <!-- Courses Section Dropdown -->
        <div x-data="{ open: false }">
          <button
            @click="open=!open"
            class="w-full flex items-center justify-between py-2.5 px-6 rounded group">
            <div class="flex items-center space-x-3">
              <i class="fa-solid fa-graduation-cap group-hover:text-indigo-400"></i>
              <span x-show="!collapsed"> Courses
              </span>
            </div>
            <svg
              :class="{'rotate-180': open}"
              x-show="!collapsed"
              class="w-4 h-4 transform transition-transform duration-300"
              fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M19 9l-7 7-7-7" />
            </svg>
          </button>
          <div
            x-show="open && !collapsed"
            x-cloak
            class="ml-8 mt-1 border-l border-gray-600 pl-4 space-y-1" >
            <a href="{{route('courses.index')}}" class="block py-2 text-sm text-gray-300 hover:text-indigo-400 flex items-center">
              <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-2"></span> View Course
            </a>
            <a href="{{route('courses.create')}}" class="block py-2 text-sm text-gray-300 hover:text-indigo-400 flex items-center">
              <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-2"></span> Add Course
            </a>
          </div>
        </div>

        <!-- Course Phases Section Dropdown -->
        <div x-data="{ open: false }">
          <button
            @click="open=!open"
            class="w-full flex items-center justify-between py-2.5 px-6 rounded group">
            <div class="flex items-center space-x-3">
              <i class="fa-solid fa-layer-group group-hover:text-indigo-400"></i>
              <span x-show="!collapsed"> Course Phases
              </span>
            </div>
            <svg
              :class="{'rotate-180': open}"
              x-show="!collapsed"
              class="w-4 h-4 transform transition-transform duration-300"
              fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M19 9l-7 7-7-7" />
            </svg>
          </button>
          <div
            x-show="open && !collapsed"
            x-cloak
            class="ml-8 mt-1 border-l border-gray-600 pl-4 space-y-1" >
            <a href="{{route('course_phases.index')}}" class="block py-2 text-sm text-gray-300 hover:text-indigo-400 flex items-center">
              <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-2"></span> View Course Phases
            </a>
            <a href="{{route('course_phases.create')}}" class="block py-2 text-sm text-gray-300 hover:text-indigo-400 flex items-center">
              <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-2"></span> Add Course Phase
            </a>
          </div>
        </div>

        <!-- Course Eligibilities Section Dropdown -->
        <div x-data="{ open: false }">
          <button
            @click="open=!open"
            class="w-full flex items-center justify-between py-2.5 px-6 rounded group">
            <div class="flex items-center space-x-3">
              <i class="fa-solid fa-check-circle group-hover:text-indigo-400"></i>
              <span x-show="!collapsed"> Course Eligibilities
              </span>
            </div>
            <svg
              :class="{'rotate-180': open}"
              x-show="!collapsed"
              class="w-4 h-4 transform transition-transform duration-300"
              fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M19 9l-7 7-7-7" />
            </svg>
          </button>
          <div
            x-show="open && !collapsed"
            x-cloak
            class="ml-8 mt-1 border-l border-gray-600 pl-4 space-y-1" >
            <a href="{{route('course_eligibilities.index')}}" class="block py-2 text-sm text-gray-300 hover:text-indigo-400 flex items-center">
              <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-2"></span> View Course Eligibilities
            </a>
            <a href="{{route('course_eligibilities.create')}}" class="block py-2 text-sm text-gray-300 hover:text-indigo-400 flex items-center">
              <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-2"></span> Add Course Eligibility
            </a>
          </div>
        </div>

        <!-- Selection Processes Section Dropdown -->
        <div x-data="{ open: false }">
          <button
            @click="open=!open"
            class="w-full flex items-center justify-between py-2.5 px-6 rounded group">
            <div class="flex items-center space-x-3">
              <i class="fa-solid fa-clipboard-list group-hover:text-indigo-400"></i>
              <span x-show="!collapsed"> Selection Processes
              </span>
            </div>
            <svg
              :class="{'rotate-180': open}"
              x-show="!collapsed"
              class="w-4 h-4 transform transition-transform duration-300"
              fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M19 9l-7 7-7-7" />
            </svg>
          </button>
          <div
            x-show="open && !collapsed"
            x-cloak
            class="ml-8 mt-1 border-l border-gray-600 pl-4 space-y-1" >
            <a href="{{route('selection_processes.index')}}" class="block py-2 text-sm text-gray-300 hover:text-indigo-400 flex items-center">
              <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-2"></span> View Selection Processes
            </a>
            <a href="{{route('selection_processes.create')}}" class="block py-2 text-sm text-gray-300 hover:text-indigo-400 flex items-center">
              <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-2"></span> Add Selection Process
            </a>
          </div>
        </div>

        <!-- Facilities Section Dropdown -->
        <div x-data="{ open: false }">
          <button
            @click="open=!open"
            class="w-full flex items-center justify-between py-2.5 px-6 rounded group">
            <div class="flex items-center space-x-3">
              <i class="fa-solid fa-building group-hover:text-indigo-400"></i>
              <span x-show="!collapsed"> Facilities
              </span>
            </div>
            <svg
              :class="{'rotate-180': open}"
              x-show="!collapsed"
              class="w-4 h-4 transform transition-transform duration-300"
              fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M19 9l-7 7-7-7" />
            </svg>
          </button>
          <div
            x-show="open && !collapsed"
            x-cloak
            class="ml-8 mt-1 border-l border-gray-600 pl-4 space-y-1" >
            <a href="{{route('facilities.index')}}" class="block py-2 text-sm text-gray-300 hover:text-indigo-400 flex items-center">
              <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-2"></span> View Facilities
            </a>
            <a href="{{route('facilities.create')}}" class="block py-2 text-sm text-gray-300 hover:text-indigo-400 flex items-center">
              <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-2"></span> Add Facility
            </a>
          </div>
        </div>

        <!-- Careers Section Dropdown -->
        <div x-data="{ open: false }">
          <button
            @click="open=!open"
            class="w-full flex items-center justify-between py-2.5 px-6 rounded group">
            <div class="flex items-center space-x-3">
              <i class="fa-solid fa-briefcase group-hover:text-indigo-400"></i>
              <span x-show="!collapsed"> Careers
              </span>
            </div>
            <svg
              :class="{'rotate-180': open}"
              x-show="!collapsed"
              class="w-4 h-4 transform transition-transform duration-300"
              fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M19 9l-7 7-7-7" />
            </svg>
          </button>
          <div
            x-show="open && !collapsed"
            x-cloak
            class="ml-8 mt-1 border-l border-gray-600 pl-4 space-y-1" >
            <a href="{{route('careers.index')}}" class="block py-2 text-sm text-gray-300 hover:text-indigo-400 flex items-center">
              <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-2"></span> View Careers
            </a>
            <a href="{{route('careers.create')}}" class="block py-2 text-sm text-gray-300 hover:text-indigo-400 flex items-center">
              <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-2"></span> Add Career
            </a>
          </div>
        </div>

        <!-- Gallery Section Dropdown -->
        <div x-data="{ open: false }">
          <button
            @click="open=!open"
            class="w-full flex items-center justify-between py-2.5 px-6 rounded group">
            <div class="flex items-center space-x-3">
              <i class="fa-solid fa-images group-hover:text-indigo-400"></i>
              <span x-show="!collapsed"> Gallery
              </span>
            </div>
            <svg
              :class="{'rotate-180': open}"
              x-show="!collapsed"
              class="w-4 h-4 transform transition-transform duration-300"
              fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M19 9l-7 7-7-7" />
            </svg>
          </button>
          <div
            x-show="open && !collapsed"
            x-cloak
            class="ml-8 mt-1 border-l border-gray-600 pl-4 space-y-1" >
            <a href="{{route('gallery.index')}}" class="block py-2 text-sm text-gray-300 hover:text-indigo-400 flex items-center">
              <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-2"></span> View Gallery
            </a>
            <a href="{{route('gallery.create')}}" class="block py-2 text-sm text-gray-300 hover:text-indigo-400 flex items-center">
              <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-2"></span> Add Gallery
            </a>
          </div>
        </div>

        <!-- FAQ Section Dropdown -->
        <div x-data="{ open: false }">
          <button
            @click="open=!open"
            class="w-full flex items-center justify-between py-2.5 px-6 rounded group">
            <div class="flex items-center space-x-3">
              <i class="fa-solid fa-question group-hover:text-indigo-400"></i>
              <span x-show="!collapsed"> FAQs
              </span>
            </div>
            <svg
              :class="{'rotate-180': open}"
              x-show="!collapsed"
              class="w-4 h-4 transform transition-transform duration-300"
              fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M19 9l-7 7-7-7" />
            </svg>
          </button>
          <div
            x-show="open && !collapsed"
            x-cloak
            class="ml-8 mt-1 border-l border-gray-600 pl-4 space-y-1" >
            <a href="{{route('faq.index')}}" class="block py-2 text-sm text-gray-300 hover:text-indigo-400 flex items-center">
              <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-2"></span> View FAQs
            </a>
            <a href="{{route('faq.create')}}" class="block py-2 text-sm text-gray-300 hover:text-indigo-400 flex items-center">
              <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-2"></span> Add FAQ
            </a>
          </div>
        </div>

        <!-- Home Career Section Dropdown -->
        <div x-data="{ open: false }">
          <button
            @click="open=!open"
            class="w-full flex items-center justify-between py-2.5 px-6 rounded group">
            <div class="flex items-center space-x-3">
              <i class="fa-solid fa-house-laptop group-hover:text-indigo-400"></i>
              <span x-show="!collapsed"> Home Career
              </span>
            </div>
            <svg
              :class="{'rotate-180': open}"
              x-show="!collapsed"
              class="w-4 h-4 transform transition-transform duration-300"
              fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M19 9l-7 7-7-7" />
            </svg>
          </button>
          <div
            x-show="open && !collapsed"
            x-cloak
            class="ml-8 mt-1 border-l border-gray-600 pl-4 space-y-1" >
            <a href="{{route('homecareer.index')}}" class="block py-2 text-sm text-gray-300 hover:text-indigo-400 flex items-center">
              <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-2"></span> View Home Career
            </a>
            <a href="{{route('homecareer.create')}}" class="block py-2 text-sm text-gray-300 hover:text-indigo-400 flex items-center">
              <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-2"></span> Add Home Career
            </a>
          </div>
        </div>
      </nav>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">

      <!-- Topbar -->
      <header class="flex items-center justify-between bg-[rgb(26,32,53)] text-white p-4 shadow">
        <div class="flex items-center space-x-4">
          <!-- Toggle Button -->
          <button @click="collapsed = !collapsed" class="p-2 rounded focus:outline-none">
            <i class="fa-solid fa-bars"></i>
          </button>

          <input type="text" placeholder="Search..."
            class="px-3 py-2 border rounded focus:outline-none focus:ring focus:ring-indigo-500 text-black">
        </div>

        <div class="flex items-center space-x-4">
          <!-- ✅ Logout Button -->
          <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded flex items-center space-x-2">
              <i class="fa-solid fa-right-from-bracket"></i>
              <span>Logout</span>
            </button>
          </form>

          <!-- Profile -->
          <div class="relative">
            <button class="p-2 rounded">
              <img class="w-8 h-8 rounded-full" src="https://i.pravatar.cc/300" alt="Profile">
            </button>
          </div>
        </div>
      </header>

      <div class="max-w-5xl mx-auto mt-4">
            @if(session('success'))
                <div class="bg-green-100 text-green-700 p-3 rounded mb-6 shadow-sm">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="mb-4 p-4 bg-red-100 text-red-800 rounded">
                    {{ session('error') }}
                </div>
            @endif
      </div>

      <!-- Page Content -->
      <main class="flex-1 p-6 bg-gray-100">
        <div class="bg-white rounded-lg shadow p-6">
          @yield('content')
        </div>
      </main>
    </div>
  </div>


    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white rounded-lg p-6 w-96 text-center">
            <h2 class="text-xl font-bold mb-4">Are you sure?</h2>
            <p class="mb-6">Do you really want to delete this record? This action cannot be undone.</p>
            <div class="flex justify-center gap-4">
                <button onclick="closeDeleteModal()" class="bg-gray-300 px-4 py-2 rounded">Cancel</button>
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Delete</button>
                </form>
            </div>
        </div>
    </div>

    <script>
    function openDeleteModal(resourceType, id) {
        const modal = document.getElementById('deleteModal');
        const form = document.getElementById('deleteForm');
        form.action = `/${resourceType}/${id}`; // set form action dynamically
        modal.classList.remove('hidden');
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }
    </script>

    <!-- Alpine.js for dropdowns -->
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    @yield('script')

</body>
</html>
