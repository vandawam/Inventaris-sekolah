
<div class="w-44 h-full flex flex-col items-center bg-[#FA6601] border-r border-gray-200 dark:bg-gray-900 dark:border-gray-700 text-white font-medium">
    <div class="h-full py-2 overflow-y-auto w-full bg-[#FA6601] dark:bg-gray-800 text-xs flex justify-center ">
       <ul class="space-y-1  dark:border-gray-700 w-40 ">
        <p class="text-2xl text-center my-3">Vanda</p>
        {{-- Dashboard --}}
        <li>
         @if ($title == 'Admin')
            <a href="/admin" class="flex  items-center p-2 text-[#FA6601] rounded-lg dark:text-white bg-white dark:bg-gray-700 group ">
               <svg width="15" class="group-hover:fill-[#FFFFFF]" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M14.8064 13.7982C14.8064 14.2725 14.6455 14.6784 14.3236 15.0159C14.0017 15.3533 13.6143 15.5224 13.1613 15.5229H1.64516C1.19274 15.5229 0.805581 15.3539 0.483677 15.0159C0.161774 14.6778 0.000548387 14.2719 0 13.7982L0 1.72487C0 1.25056 0.161226 0.844384 0.483677 0.50633C0.806129 0.168278 1.19329 -0.000460625 1.64516 0.000114441H13.1613C13.6137 0.000114441 14.0011 0.168853 14.3236 0.50633C14.646 0.843809 14.807 1.24999 14.8064 1.72487V13.7982ZM13.1613 9.48629H8.22581V13.7982H13.1613V9.48629ZM13.1613 7.76153V1.72487H8.22581V7.76153H13.1613ZM6.58064 13.7982L6.58064 1.72487H1.64516L1.64516 13.7982H6.58064Z" fill="currentColor"/>
                  </svg>
               <span class="ms-2">Dashboard</span>
            </a>
         @else
            <a href="/admin" class="flex  items-center p-2 hover:text-[#FA6601] rounded-lg dark:text-white hover:bg-white dark:hover:bg-gray-700 group ">
               <svg width="15" class="group-hover:fill-[#FFFFFF]" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M14.8064 13.7982C14.8064 14.2725 14.6455 14.6784 14.3236 15.0159C14.0017 15.3533 13.6143 15.5224 13.1613 15.5229H1.64516C1.19274 15.5229 0.805581 15.3539 0.483677 15.0159C0.161774 14.6778 0.000548387 14.2719 0 13.7982L0 1.72487C0 1.25056 0.161226 0.844384 0.483677 0.50633C0.806129 0.168278 1.19329 -0.000460625 1.64516 0.000114441H13.1613C13.6137 0.000114441 14.0011 0.168853 14.3236 0.50633C14.646 0.843809 14.807 1.24999 14.8064 1.72487V13.7982ZM13.1613 9.48629H8.22581V13.7982H13.1613V9.48629ZM13.1613 7.76153V1.72487H8.22581V7.76153H13.1613ZM6.58064 13.7982L6.58064 1.72487H1.64516L1.64516 13.7982H6.58064Z" fill="currentColor"/>
                  </svg>
                <span class="ms-2">Dashboard</span>
            </a>
         @endif
        </li>

        <li>
         @if ($title == 'Ruangan')
            <a href="/admin/ruangan" class="flex  items-center p-2 text-[#FA6601] rounded-lg dark:text-white bg-white dark:bg-gray-700 group ">
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="16" fill="currentColor" class="bi bi-door-open" viewBox="0 0 16 16">
                    <path d="M8.5 10c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1"/>
                    <path d="M10.828.122A.5.5 0 0 1 11 .5V1h.5A1.5 1.5 0 0 1 13 2.5V15h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V1.5a.5.5 0 0 1 .43-.495l7-1a.5.5 0 0 1 .398.117M11.5 2H11v13h1V2.5a.5.5 0 0 0-.5-.5M4 1.934V15h6V1.077z"/>
                  </svg>
               <span class="ms-2">Ruangan</span>
            </a>
         @else
            <a href="/admin/ruangan" class="flex  items-center p-2 hover:text-[#FA6601] rounded-lg dark:text-white hover:bg-white dark:hover:bg-gray-700 group ">
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="16" fill="currentColor" class="bi bi-door-open" viewBox="0 0 16 16">
                    <path d="M8.5 10c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1"/>
                    <path d="M10.828.122A.5.5 0 0 1 11 .5V1h.5A1.5 1.5 0 0 1 13 2.5V15h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V1.5a.5.5 0 0 1 .43-.495l7-1a.5.5 0 0 1 .398.117M11.5 2H11v13h1V2.5a.5.5 0 0 0-.5-.5M4 1.934V15h6V1.077z"/>
                  </svg>
                <span class="ms-2">Ruangan</span>
            </a>
         @endif
        </li>

        <li>
         @if ($title == 'Barang')
            <a href="/admin/barang" class="flex  items-center p-2 text-[#FA6601] rounded-lg dark:text-white bg-white dark:bg-gray-700 group ">
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="16" fill="currentColor" class="bi bi-box2" viewBox="0 0 16 16">
                    <path d="M2.95.4a1 1 0 0 1 .8-.4h8.5a1 1 0 0 1 .8.4l2.85 3.8a.5.5 0 0 1 .1.3V15a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4.5a.5.5 0 0 1 .1-.3zM7.5 1H3.75L1.5 4h6zm1 0v3h6l-2.25-3zM15 5H1v10h14z"/>
                  </svg>
               <span class="ms-2">Barang</span>
            </a>
         @else
            <a href="/admin/barang" class="flex  items-center p-2 hover:text-[#FA6601] rounded-lg dark:text-white hover:bg-white dark:hover:bg-gray-700 group ">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box2" viewBox="0 0 16 16">
                    <path d="M2.95.4a1 1 0 0 1 .8-.4h8.5a1 1 0 0 1 .8.4l2.85 3.8a.5.5 0 0 1 .1.3V15a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4.5a.5.5 0 0 1 .1-.3zM7.5 1H3.75L1.5 4h6zm1 0v3h6l-2.25-3zM15 5H1v10h14z"/>
                  </svg>
                <span class="ms-2">Barang</span>
            </a>
         @endif
        </li>

        <li>
         @if ($title == 'Akun')
            <a href="/admin/akun" class="flex  items-center p-2 text-[#FA6601] rounded-lg dark:text-white bg-white dark:bg-gray-700 group ">
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="16" fill="currentColor" class="bi bi-box2" viewBox="0 0 16 16">
                    <path d="M2.95.4a1 1 0 0 1 .8-.4h8.5a1 1 0 0 1 .8.4l2.85 3.8a.5.5 0 0 1 .1.3V15a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4.5a.5.5 0 0 1 .1-.3zM7.5 1H3.75L1.5 4h6zm1 0v3h6l-2.25-3zM15 5H1v10h14z"/>
                  </svg>
               <span class="ms-2">Akun</span>
            </a>
         @else
            <a href="/admin/akun" class="flex  items-center p-2 hover:text-[#FA6601] rounded-lg dark:text-white hover:bg-white dark:hover:bg-gray-700 group ">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box2" viewBox="0 0 16 16">
                    <path d="M2.95.4a1 1 0 0 1 .8-.4h8.5a1 1 0 0 1 .8.4l2.85 3.8a.5.5 0 0 1 .1.3V15a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4.5a.5.5 0 0 1 .1-.3zM7.5 1H3.75L1.5 4h6zm1 0v3h6l-2.25-3zM15 5H1v10h14z"/>
                  </svg>
                <span class="ms-2">Akun</span>
            </a>
         @endif
        </li>
       </ul>
    </div>
 </div>
