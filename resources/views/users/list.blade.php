<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Users') }}
            </h2>
            <a href="" class="bg-slate-700 text-sm rounded-md text-white px-3 py-3" >Create</a>
        </div>
       
    </x-slot>
 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
<x-message></x-message>

         <table class="w-full">
            <thead>
                <tr class="border-b">
                    <th class="px-6 py-3 text-left" width="60">#</th>
                    <th class="px-6 py-3 text-left">Name</th>
                    <th class="px-6 py-3 text-left">Email</th>
                    <th class="px-6 py-3 text-left" width="180" >Created</th>
                    <th class="px-6 py-3 text-center" width="180">Action</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @if ($users->isNotEmpty())
                 @foreach ($users as $user )
                 <tr class="border-b">
                    <td class="px-6 py-3 text-left">{{$user->id}}</td>
                    <td class="px-6 py-3 text-left">{{$user->name}}</td>
                    <td class="px-6 py-3 text-left">{{$user->email}}</td>
                    <td class="px-6 py-3 text-left">{{$user->roles->pluck('name')->implode(' ,')}}</td>
                    <td class="px-6 py-3 text-left">{{\Carbon\Carbon::parse($user->created_at) ->format('d M, Y')}}</td>
                    <td class="px-6 py-3 text-center"> 
                          
                    </td>
                </tr> 
                 @endforeach   
                @endif
              
            </tbody>
         </table>
        </div>
    </div>
  
</x-app-layout>
