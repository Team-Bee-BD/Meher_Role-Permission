<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('articles') }}
            </h2>
            <a href="{{route('articles.create')}} " class="bg-slate-700 text-sm rounded-md  text-white px-3 py-3" style="text-decoration: btn " >Create</a>
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
                    <th class="px-6 py-3 text-left">Content</th>
                    <th class="px-6 py-3 text-left">Author</th>
                    <th class="px-6 py-3 text-left" width="180" >Created</th>
                    <th class="px-6 py-3 text-center" width="180">Action</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @if ($articles->isNotEmpty())
                 @foreach ($articles as $article )
                 <tr class="border-b">
                    <td class="px-6 py-3 text-left">{{$article->id}}</td>
                    <td class="px-6 py-3 text-left">{{$article->title}}</td>
                    <td class="px-6 py-3 text-left">{{$article->content}}</td>
                    <td class="px-6 py-3 text-left">{{$article->author}}</td>
                    <td class="px-6 py-3 text-left">{{\Carbon\Carbon::parse($article->created_at) ->format('d M, Y')}}</td>
                    <td class="px-6 py-3 text-center"> 
                         <a href="javascript:void(0);"onclick ="deletearticles({{$article->id}})" class="bg-red-600 text-sm rounded-md text-white px-3 py-3 hover:bg-red-500" >Delete</a>
                  </td>
                </tr> 
                 @endforeach   
                @endif
              
            </tbody>
         </table>
        </div>
    </div>
</div>
<x-slot name="script">
    <script type="text/javascript"> 
        function deletearticles(id) {
            if (confirm('Are you sure you want to delete?')) {
                $.ajax({
                    url: '{{ route("articles.destroy", ":id") }}'.replace(':id', id),
                    type: 'DELETE',
                    dataType: 'json',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        window.location.href = '{{ route("articles.index") }}';
                    },
                    error: function(xhr) {
                        alert('Something went wrong.');
                    }
                });
            }
        }
    </script>
</x-slot>

</x-app-layout>
