
<x-layout>
    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
        <div class="mt-8 text-2xl">
            Contact Mangement System
        </div>

        <div class="mt-5 rounded-lg bg-card text-card-foreground ">
            <div class="my-2 " >
                <button class="bg-green-700 hover:bg-green-500 text-white font-bold py-2 px-4 rounded inline-flex items-center onc "
                onclick="window.location='{{ route("createView") }}'"
                >
                    <svg class="w-6 h-6 text-white-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/>
                    </svg>
                    <span>Add Contact</span>
                </button>

                <div class="my-5">
                  <div class="flex items-center mt-1">
                      <input type="text" id="search_text" class="w-full h-10 px-3 text-sm text-gray-700 border border-r-0 rounded-r-none border-blue-500 focus:outline-none rounded shadow-sm" placeholder="Search by Name or Email" value="{{isset($search)? "$search":""}}"/>
                      <button type="button" class="h-10 px-4 text-sm bg-blue-500 border border-l-0 border-blue-500 rounded-r shadow-sm text-blue-50 hover:text-white hover:bg-blue-400 hover:border-blue-400 focus:outline-none"
                      onclick='check()'
                      >Search</button>
                  </div>
                  <script>
                    function check(){
                      let text = document.getElementById('search_text').value;
                      if (!text) {
                        window.location = "{{ route('index')}}"
                      } 
                      else {
                        location.href = "/contacts?search=" + text
                      }
                      
                    }

                  </script>
                </div>
            </div>

            <div class="inline-flex items-center justify-between">
              <div class="my-5">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sort by <span class="font-bold">Name</span></label>
                <select id='nameSort' onChange='filterOrder()'
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="" @if ($order == '') selected @endif></option>
                    <option value="asc" @if ($sort=='name' && $order == 'asc') selected @endif>Ascending</option>
                    <option value="desc" @if ($sort=='name' && $order == 'desc') selected @endif>Descending</option>
                </select>
                <script>
                    function filterOrder() {
                      let text = document.getElementById('search_text').value;
                      let order = document.getElementById('nameSort').value;
                      if (order == ''){

                      }
                      else{
                        if(!text){
                          location.href = "/contacts?sort=name&order="+order
                        }
                        else{
                          location.href = "/contacts?search="+text+"&sort=name&order="+order
                        }
                      }
                    }
                </script>
              </div>
              <div class="my-5 pl-6">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sort by <span class="font-bold">Created Date</span></label>
                <select id='dateSort' onChange='filterOrder_date()'
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="" @if ($order == '') selected @endif></option>
                    <option value="asc" @if ($sort=='date' && $order == 'asc') selected @endif>Ascending</option>
                    <option value="desc" @if ($sort=='date' && $order == 'desc') selected @endif>Descending</option>
                </select>
                <script>
                  function filterOrder_date() {
                    let text = document.getElementById('search_text').value;
                    let order = document.getElementById('dateSort').value;
                    if (order == ''){
                    }
                    else{
                      if(!text){
                        location.href = "/contacts?sort=date&order="+order
                      }
                      else{
                        location.href = "/contacts?search="+text+"&sort=date&order="+order
                      }
                    }
                  }
                </script>
              </div>
            </div>

        </div>
    </div>

    <div class="container mx-auto">
        <div>
            <table aria-describedby="info-popup" aria-label="open tickets" class="border-t w-full min-h-0 h-full flex flex-col">
                <thead class="flex w-full flex-col px-4">
                  <tr class="border-b flex">
                    <th class="font-semibold text-left py-3 px-1 w-14 truncate">
                      ID
                    </th>
                    <th class="font-semibold text-left py-3 px-1 flex-1 truncate">
                        Name
                      </th>
          
                    <th class="font-semibold text-left py-3 px-1 flex-1 truncate">
                      Phone
                    </th>
                    <th class="font-semibold text-left py-3 px-1 flex-1 truncate">
                      Email
                    </th>
                    <th class="font-semibold text-left py-3 px-1 flex-1 truncate">
                      Address
                    </th>
                    <th class="font-semibold text-left py-3 px-1 flex-1 truncate">
                      Created At
                    </th>
                    <th class="font-semibold text-left py-3 pl-3 pr-1 flex-1">
                        {{-- <input type="checkbox" name="" id="" /> --}}
                        Action
                    </th>  
                  </tr>
                </thead>
                <tbody class="flex w-full flex-col flex-1 min-h-0 overflow-hidden px-4">
                    @foreach ($contacts as $contact)
                    {{-- <div class="mt-5 rounded-lg border bg-card text-card-foreground shadow-sm">
                        {{$contact}}
                    </div> --}}
                            <tr role="row" class="hover:bg-blue-100 border-b flex cursor-pointer">
                                    <td class="py-3 px-1 w-14">
                                        <a href="{{ route('show',$contact->id)}}">
                                            <div class="relative group w-full">
                                                <p class="w-full truncate">
                                                    {{$contact->id}}
                                                </p>
                                            </div>
                                        </a>
                                    </td>
                                    <td class="py-3 px-1 flex-1 truncate">
                                        <a href="{{ route('show',$contact->id)}}">
                                            <div class="relative group w-full">
                                                <p class="w-full truncate">
                                                    {{$contact->name}}
                                                </p>
                                            </div>
                                        </a>
                                    </td>
                                    <td class="py-3 px-1 flex-1 truncate">
                                        <a  href="{{ route('show',$contact->id)}}">
                                            <div class="relative group w-full">
                                                {{-- {{$contact->phone ? 'a':'b'}} --}}
                                                <p class="w-full truncate">
                                                    {{$contact->phone ? $contact->phone:'-' }}
                                                </p>
                                            </div>
                                        </a>
                                    </td>
                                    <td class="py-3 px-1 flex-1 truncate">
                                        <a href="{{ route('show',$contact->id)}}">
                                            <div class="relative group w-full">
                                                <p class="w-full truncate">
                                                    {{$contact->email ? $contact->email:'-'}}
                                                </p>
                                            </div>
                                        </a>
                                    </td>
                                    <td class="py-3 px-1 flex-1 truncate">
                                        <a href="{{ route('show',$contact->id)}}">
                                            <div class="relative group w-full">
                                                <p class="w-full truncate">
                                                    {{$contact->address?$contact->address:'-'}}
                                                </p>
                                            </div>
                                        </a>
                                    </td>
                                    <td class="py-3 px-1 flex-1 truncate">
                                        <a href="{{ route('show',$contact->id)}}">
                                            <div class="relative group w-full">
                                                <p class="w-full truncate">
                                                    {{ \Carbon\Carbon::parse($contact->created_at)->toFormattedDateString() }}
                                                </p>
                                            </div>
                                        </a>
                                    </td>

                                <td class="flex items-center py-3 pl-3 pr-1 flex-1">
                                  <button class="bg-blue-500 text-white inline-flex items-center justify-center whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-9 rounded-md px-3 mr-2" 
                                  onclick="window.location='{{ route('show',$contact->id)}}'">
                                  View
                                </button>


                                  {{-- <form action="{{route('show',$contact->id)}}" method="GET">
                                      @method('PATCH')
                                      <input type="hidden" name="Edit" value="Edit">
                                      <button type="submit"
                                          class="bg-yellow-500 text-white inline-flex items-center justify-center whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-9 rounded-md px-3 mr-2">
                                          Edit
                                      </button>
                                  </form> --}}
                                  <button class="bg-yellow-500 text-white inline-flex items-center justify-center whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-9 rounded-md px-3 mr-2" 
                                    onclick="window.location='{{route('editView',$contact->id)}}'">
                                    Edit
                                  </button>
                                  

                                  <form action="{{route('delete',$contact->id)}}" method="POST">
                                      @method('DELETE')
                                      @csrf
                                      <input type="hidden" name="Delete" value="Delete">
                                      <button type="submit"
                                          class="bg-red-500 text-white inline-flex items-center justify-center whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-9 rounded-md px-3 mr-2"
                                          {{-- onclick="return confirm('are you sure?')" --}}
                                          >
                                          Delete
                                      </button>
                                  </form>
                                </td>
                            </tr>
                    @endforeach
                </tbody>               
            </table>
            <div class="flex justify-center mt-10 space-x-2">
              {{ $contacts->links() }}
            </div>
            
        </div>
    </div>




    {{-- <table aria-describedby="info-popup" aria-label="open tickets" class="border-t w-full min-h-0 h-full flex flex-col">
        <thead class="flex w-full flex-col px-4">
          <tr class="border-b flex">
            <th class="font-semibold text-left py-3 pl-3 pr-1 w-24">
              <input type="checkbox" name="" id="" />
            </th>
            <th class="font-semibold text-left py-3 px-1 w-14 truncate">
              ID
            </th>
            <th class="font-semibold text-left py-3 px-1 flex-1 truncate">
                Name
              </th>
  
            <th class="font-semibold text-left py-3 px-1 flex-1 truncate">
              Phone
            </th>
            <th class="font-semibold text-left py-3 px-1 flex-1 truncate">
              Email
            </th>
            <th class="font-semibold text-left py-3 px-1 flex-1 truncate">
              Address
            </th>
            <th class="font-semibold text-left py-3 px-1 flex-1 truncate">
              Created At
            </th>
          </tr>
        </thead>
        <tbody class="flex w-full flex-col flex-1 min-h-0 overflow-hidden px-4">
            <tr role="row" class="hover:bg-blue-100 border-b flex cursor-pointer">
                <td role="cell" headers="select" class="py-3 pl-3 pr-1 w-24 flex items-start">
                  <input class="mt-1" type="checkbox">
                  
                </td>
                <td class="py-3 px-1 w-14">
                  12
                </td>
                <td class="py-3 px-1 flex-1 truncate">
                  <div class="relative group w-full">
                    <p class="w-full truncate">
                      Quo laudantium error corporis accusamus unde, labore
                      quidem non officiis.
                    </p>
                  </div>
                </td>
                <td class="py-3 px-1 flex-1 truncate">
                  Marla Darsuz
                </td>
                <td class="py-3 px-1 flex-1 truncate">
                  Tuesday 09:56
                </td>
                <td class="py-3 px-1 flex-1 truncate">
                  UK Support
                </td>
                <td class="py-3 px-1 flex-1 truncate">
                  Nico Braun
                </td>
              </tr>
        </tbody>
      </table> --}}





</x-layout>