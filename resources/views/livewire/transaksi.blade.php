    <div>


        @if (!$transaksiAktif)
        <div class="content">
            <h2 class="intro-y text-lg font-medium mt-10">
                Transaction List
            </h2>
            <div class="grid grid-cols-12 gap-6 mt-5">
                <div class="intro-y col-span-12 flex flex-wrap xl:flex-nowrap items-center mt-2">
                    <div class="flex w-full sm:w-auto">
                        <div class="w-48 relative text-slate-500">
                            <input type="text" class="form-control w-48 box pr-10" placeholder="Search by invoice...">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="search" class="lucide lucide-search w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search">
                                <circle cx="11" cy="11" r="8"></circle>
                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                            </svg>
                        </div>

                    </div>
                    <div class="w-full xl:w-auto flex items-center mt-3 xl:mt-0">
                        <div class="dropdown">
                            <button wire:click='transaksiBaru' class="dropdown-toggle btn px-2 box" aria-expanded="false" data-tw-toggle="dropdown">
                                <span class="w-5 h-5 flex items-center justify-center"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="plus" class="lucide lucide-plus w-4 h-4" data-lucide="plus">
                                        <line x1="12" y1="5" x2="12" y2="19"></line>
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                    </svg> </span>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- BEGIN: Data List -->
                <div class="intro-y col-span-12 overflow-auto 2xl:overflow-visible">
                    <table class="table table-report -mt-2">
                        <thead>
                            <tr>
                                <th class="whitespace-nowrap">
                                    <input class="form-check-input" type="checkbox">
                                </th>
                                <th class="whitespace-nowrap">INVOICE</th>
                                <th class="text-center whitespace-nowrap">STATUS</th>
                                <th class="whitespace-nowrap">PAYMENT</th>
                                <th class="text-right whitespace-nowrap">
                                    <div class="pr-16">TOTAL TRANSACTION</div>
                                </th>
                                <th class="text-center whitespace-nowrap">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transaksiList as $transaksi)
                            <tr class="intro-x">
                                <td class="w-10">
                                    <input class="form-check-input" type="checkbox">
                                </td>
                                <td class="w-40 !py-4">
                                    <a href="" class="underline decoration-dotted whitespace-nowrap">
                                        #{{ $transaksi->kode }}
                                    </a>
                                </td>
                                
                                <td class="text-center">
                                    <div class="flex items-center justify-center whitespace-nowrap 
                    {{ $transaksi->status === 'selesai' ? 'text-success' : 'text-warning' }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-check-square w-4 h-4 mr-2">
                                            <polyline points="9 11 12 14 22 4"></polyline>
                                            <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2h11"></path>
                                        </svg>
                                        {{ ucfirst($transaksi->status) }}
                                    </div>
                                </td>
                                <td>
                                    <div class="whitespace-nowrap">
                                        CASH
                                    </div>
                                    <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">
                                        {{ $transaksi->created_at->format('d M, H:i') }}
                                    </div>
                                </td>
                                <td class="w-40 text-right">
                                    <div class="pr-16">
                                        Rp{{ number_format($transaksi->total, 0, ',', '.') }}
                                    </div>
                                </td>
                                <td class="table-report__action">
                                    <div class="flex justify-center items-center">
                                        <a class="flex items-center text-primary whitespace-nowrap mr-5" href="javascript:;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" class="lucide lucide-check-square w-4 h-4 mr-1">
                                                <polyline points="9 11 12 14 22 4"></polyline>
                                                <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2h11"></path>
                                            </svg>
                                            View Details
                                        </a>
                                    
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
                <!-- END: Data List -->
                <!-- BEGIN: Pagination -->
                <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
                    <nav class="w-full sm:w-auto sm:mr-auto">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="#"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevrons-left" class="lucide lucide-chevrons-left w-4 h-4" data-lucide="chevrons-left">
                                        <polyline points="11 17 6 12 11 7"></polyline>
                                        <polyline points="18 17 13 12 18 7"></polyline>
                                    </svg> </a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-left" class="lucide lucide-chevron-left w-4 h-4" data-lucide="chevron-left">
                                        <polyline points="15 18 9 12 15 6"></polyline>
                                    </svg> </a>
                            </li>
                            <li class="page-item"> <a class="page-link" href="#">...</a> </li>
                            <li class="page-item"> <a class="page-link" href="#">1</a> </li>
                            <li class="page-item active"> <a class="page-link" href="#">2</a> </li>
                            <li class="page-item"> <a class="page-link" href="#">3</a> </li>
                            <li class="page-item"> <a class="page-link" href="#">...</a> </li>
                            <li class="page-item">
                                <a class="page-link" href="#"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-right" class="lucide lucide-chevron-right w-4 h-4" data-lucide="chevron-right">
                                        <polyline points="9 18 15 12 9 6"></polyline>
                                    </svg> </a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevrons-right" class="lucide lucide-chevrons-right w-4 h-4" data-lucide="chevrons-right">
                                        <polyline points="13 17 18 12 13 7"></polyline>
                                        <polyline points="6 17 11 12 6 7"></polyline>
                                    </svg> </a>
                            </li>
                        </ul>
                    </nav>
                    <select class="w-20 form-select box mt-3 sm:mt-0">
                        <option>10</option>
                        <option>25</option>
                        <option>35</option>
                        <option>50</option>
                    </select>
                </div>
                <!-- END: Pagination -->
            </div>
            <!-- BEGIN: Delete Confirmation Modal -->
            <div id="delete-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body p-0">
                            <div class="p-5 text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="x-circle" data-lucide="x-circle" class="lucide lucide-x-circle w-16 h-16 text-danger mx-auto mt-3">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="15" y1="9" x2="9" y2="15"></line>
                                    <line x1="9" y1="9" x2="15" y2="15"></line>
                                </svg>
                                <div class="text-3xl mt-5">Are you sure?</div>
                                <div class="text-slate-500 mt-2">
                                    Do you really want to delete these records?
                                    <br>
                                    This process cannot be undone.
                                </div>
                            </div>
                            <div class="px-5 pb-8 text-center">
                                <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                                <button type="button" class="btn btn-danger w-24">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Delete Confirmation Modal -->
        </div>
        @else
        <div class="content">
            <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
                <h2 class="text-lg font-medium mr-auto">
                    Point of Sale
                </h2>
                <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                    <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#new-order-modal" class="btn btn-primary shadow-md mr-2">{{$transaksiAktif->kode }}</a>
                </div>
            </div>
            <div class="intro-y grid grid-cols-12 gap-5 mt-5">
                <!-- BEGIN: Item List -->
                <div class="intro-y col-span-12 lg:col-span-8">
                    <div class="lg:flex intro-y">
                        <div class="relative">
                            <input type="text" class="form-control py-3 px-4 w-full lg:w-64 box pr-10" placeholder="Search item...">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="search" class="lucide lucide-search w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0 text-slate-500" data-lucide="search">
                                <circle cx="11" cy="11" r="8"></circle>
                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                            </svg>
                        </div>
                        <select class="form-select py-3 px-4 box w-full lg:w-auto mt-3 lg:mt-0 ml-auto">
                            <option>Sort By</option>
                            <option>A to Z</option>
                            <option>Z to A</option>
                            <option>Lowest Price</option>
                            <option>Highest Price</option>
                        </select>
                    </div>
                    <div class="grid grid-cols-12 gap-5 mt-5">
                        @foreach ($produkList as $produk)
                        <div class="col-span-12 sm:col-span-4 2xl:col-span-3 box p-5 cursor-pointer zoom-in">
                            <div class="font-medium text-base">{{ $produk->nama }}</div>
                            <div class="text-slate-500"> Stok {{ $produk->stok }}</div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <!-- END: Item List -->
                <!-- BEGIN: Ticket -->
                <div class="col-span-12 lg:col-span-4">
                    <div class="intro-y pr-1">
                        <div class="box p-2">
                            <ul class="nav nav-pills" role="tablist">
                                <li id="ticket-tab" class="nav-item flex-1" role="presentation">
                                    <button class="nav-link w-full py-2 active" data-tw-toggle="pill" data-tw-target="#ticket" type="button" role="tab" aria-controls="ticket" aria-selected="true"> Transaksi </button>
                                </li>
                                
                        </div>
                    </div>
                    <div class="tab-content">
                        <div class="box flex p-5 mt-5">
                            <input type="text" class="form-control py-3 px-4 w-full bg-slate-100 border-slate-200/60 pr-10" placeholder="No Invoice" wire:model.live="kode">
                        </div>
                        <div id="ticket" class="tab-pane active" role="tabpanel" aria-labelledby="ticket-tab">
                            @foreach ($semuaProduk as $detail)
                            <div class="box p-2 mt-5">
                                <a href="javascript:;" wire:click='hapusProduk({{$detail->id}})' data-tw-toggle="modal" data-tw-target="#add-item-modal" class="flex items-center p-3 cursor-pointer transition duration-300 ease-in-out bg-white dark:bg-darkmode-600 hover:bg-slate-100 dark:hover:bg-darkmode-400 rounded-md">
                                    <div class="max-w-[50%] truncate mr-1">{{ $detail->produk->nama }}</div>
                                    <div class="text-slate-500">x {{ $detail->jumlah }}</div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="edit" data-lucide="edit" class="lucide lucide-edit w-4 h-4 text-slate-500 ml-2">
                                        <path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"></path>
                                        <path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                    </svg>
                                    <div class="ml-auto font-medium"> Rp.{{ number_format($detail->produk->harga * $detail->jumlah, 2, '.', ',') }}</div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                        <div class="box flex p-5 mt-5">
                            <input type="number" class="form-control py-3 px-4 w-full bg-slate-100 border-slate-200/60 pr-10" placeholder="Bayar" wire:model.live='bayar'>
                        </div>
                        <div class="box p-5 mt-5">
                            <div class="flex">
                                <div class="mr-auto">Subtotal</div>
                                <div class="font-medium"> Rp. {{number_format($totalSemuaBelanja,2,'.',',')}}</div>
                            </div>
                            <!-- <div class="flex mt-4">
                                <div class="mr-auto">Discount</div>
                                <div class="font-medium text-danger">-$20</div>
                            </div> -->
                            <div class="flex mt-4 pt-4 border-t border-slate-200/60 dark:border-darkmode-400">
                                <div class="mr-auto font-medium text-base">Kembalian</div>
                                <div class="font-medium text-base"> Rp. {{number_format($kembalian,2,'.',',')}}</div>
                            </div>
                        </div>

                        <div class="flex mt-5">
                            @if($transaksiAktif)
                            <button wire:click='batalTransaksi' class="btn w-32 border-slate-300 dark:border-darkmode-400 text-slate-500">Clear Transaksi</button>
                            @endif
                            @if ($bayar)
                            @if ($kembalian < 0)
                                <button class="btn btn-danger w-32 shadow-md ml-auto flex items-center">
                                <i data-lucide="alert-octagon" class="w-7 h-5 mr-2"></i>
                                Uang Kurang</button>
                                @elseif ($kembalian >= 0)
                                <button class="btn btn-primary w-32 shadow-md ml-auto" wire:click="transaksiSelesai">
                                    Bayar
                                </button>
                                @endif
                                @endif

                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Ticket -->
        </div>
        <!-- BEGIN: New Order Modal -->
        @if(!$transaksiAktif)
        <div id="new-order-modal" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="font-medium text-base mr-auto">
                            New Transaksi
                        </h2>
                    </div>
                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                        <div class="col-span-12">
                            <label for="pos-form-1" class="form-label">Name</label>
                            <input id="pos-form-1" type="text" class="form-control flex-1" placeholder="Customer name">
                        </div>
                        <div class="col-span-12">
                            <label for="pos-form-2" class="form-label">Table</label>
                            <input id="pos-form-2" type="text" class="form-control flex-1" placeholder="Customer table">
                        </div>
                        <div class="col-span-12">
                            <label for="pos-form-3" class="form-label">Number of People</label>
                            <input id="pos-form-3" type="text" class="form-control flex-1" placeholder="People">
                        </div>
                    </div>
                    <div class="modal-footer text-right">
                        <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-32 mr-1">Cancel</button>
                        <button type="button" class="btn btn-primary w-32">Create Ticket</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: New Order Modal -->
        <!-- BEGIN: Add Item Modal -->
        <div id="add-item-modal" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="font-medium text-base mr-auto">
                            Fried Calamari
                        </h2>
                    </div>
                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                        <div class="col-span-12">
                            <label for="pos-form-4" class="form-label">Quantity</label>
                            <div class="flex mt-2 flex-1">
                                <button type="button" class="btn w-12 border-slate-200 bg-slate-100 dark:bg-darkmode-700 dark:border-darkmode-500 text-slate-500 mr-1">-</button>
                                <input id="pos-form-4" type="text" class="form-control w-24 text-center" placeholder="Item quantity" value="2">
                                <button type="button" class="btn w-12 border-slate-200 bg-slate-100 dark:bg-darkmode-700 dark:border-darkmode-500 text-slate-500 ml-1">+</button>
                            </div>
                        </div>
                        <div class="col-span-12">
                            <label for="pos-form-5" class="form-label">Notes</label>
                            <textarea id="pos-form-5" class="form-control w-full mt-2" placeholder="Item notes"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer text-right">
                        <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                        <button type="button" class="btn btn-primary w-24">Add Item</button>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <!-- END: Add Item Modal -->
    </div>
    @endif


    </div>