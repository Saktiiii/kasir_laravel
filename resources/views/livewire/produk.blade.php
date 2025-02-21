<div>


    <div>
        @if ($pilihanMenu=='lihat')
        <!-- mulai konten -->
        <div class="content">
            <h2 class="intro-y text-lg font-medium mt-10">
                Product List
            </h2>
            <div class="grid grid-cols-12 gap-6 mt-5">
                <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
                    <button wire:click="pilihMenu('tambah')" class="btn btn-primary shadow-md mr-2">Add New Product</button>
                    <div>
                        <button
                            wire:click="pilihMenu('excel')"
                            class="btn px-2 box flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="plus" class="lucide lucide-plus w-4 h-4" data-lucide="plus">
                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg>
                            <span class="ml-2">Import Excel</span>
                        </button>
                    </div>
                    <div class="hidden md:block mx-auto text-slate-500"></div>
                    <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                        <div class="w-56 relative text-slate-500">
                            <input type="text" class="form-control w-56 box pr-10" placeholder="Search...">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="search" class="lucide lucide-search w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search">
                                <circle cx="11" cy="11" r="8"></circle>
                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                            </svg>
                        </div>
                    </div>
                </div>
                <!-- BEGIN: Data List -->
                <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                    <table class="table table-report -mt-2">
                        <thead>
                            <tr>
                                <th class="whitespace-nowrap">NO</th>
                                <th class="whitespace-nowrap">PRODUCT NAME</th>
                                <th class="text-center whitespace-nowrap">STOCK</th>
                                <th class="text-center whitespace-nowrap">PRICE</th>
                                <th class="text-center whitespace-nowrap">BARCODE</th>
                                <th class="text-center whitespace-nowrap">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($semuaProduk as $index => $produk)
                            <tr class="intro-x">
                                <td class="w-40">
                                    {{ $index + 1 }}
                                </td>
                                <td>
                                    <a href="" class="font-medium whitespace-nowrap">{{ $produk->nama }}</a>
                                    <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">Photography</div>
                                </td>
                                <td class="text-center">{{ $produk->stok }}</td>
                                <td class="text-center">${{ number_format($produk->harga, 2) }}</td>
                                <td class="w-40">
                                    <div class="flex items-center justify-center text-danger">
                                        <i class="w-4 mr-1" data-lucide="file-minus"></i>{{ $produk->kode }}
                                    </div>
                                </td>
                                <td class="table-report__action w-56">
                                    <div class="flex justify-center items-center">
                                        <a wire:click="pilihEdit({{ $produk->id }})" class="flex items-center mr-3" href="javascript:;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="check-square" data-lucide="check-square" class="lucide lucide-check-square w-4 h-4 mr-1">
                                                <polyline points="9 11 12 14 22 4"></polyline>
                                                <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
                                            </svg> Edit
                                        </a>
                                        <a wire:click="pilihHapus({{ $produk->id }})" class="flex items-center text-danger" href="javascript:;" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="trash-2" data-lucide="trash-2" class="lucide lucide-trash-2 w-4 h-4 mr-1">
                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                <path d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2"></path>
                                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                                <line x1="14" y1="11" x2="14" y2="17"></line>
                                            </svg> Delete
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

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
                                        <polyline points="13 7 18 12 13 17"></polyline>
                                        <polyline points="6 7 11 12 6 17"></polyline>
                                    </svg> </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <!-- END: Pagination -->
            </div>
        </div>
        <!-- END: Content -->
        @elseif ($pilihanMenu=='tambah')
        <div class="card border-secondary">
            <div class="card-header bg-secondary text-white">
                <strong class="text-primary">Tambah Produk</strong>
            </div>
            <div class="card-body mt-3">
                <!-- Form Tambah Pengguna -->
                <form wire:submit="simpan">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" wire:model='nama' />
                        @error('nama')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="kode" class="form-label">Kode / Barcode</label>
                        <input type="text" class="form-control" wire:model='kode' />
                        @error('kode')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="number" class="form-control" wire:model='harga' />
                        @error('harga')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="peran" class="form-label">Stok</label>
                        <input type="number" class="form-control" wire:model='stok' />
                        @error('stok')
                        <span class="text-danger">{{ $message }} </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                    <button type="button" wire:click='batal' class="btn btn-outline-primary">Batal</button>
                </form>
            </div>
        </div>
        @elseif ($pilihanMenu=='edit')
        <div class="card border-secondary">
            <div class="card-header bg-secondary text-primary">
                <strong>Edit Pengguna</strong>
            </div>
            <div class="card-body">
                <!-- Form Edit Pengguna -->
                <form wire:submit="simpanEdit">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" wire:model='nama' />
                        @error('nama')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="kode" class="form-label">Kode / Barcode</label>
                        <input type="text" class="form-control" wire:model='kode' />
                        @error('kode')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="number" class="form-control" wire:model='harga' />
                        @error('harga')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="peran" class="form-label">Stok</label>
                        <input type="number" class="form-control" wire:model='stok' />
                        @error('stok')
                        <span class="text-danger">{{ $message }} </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                    <button type="button" wire:click='batal' class="btn btn-outline-primary">Batal</button>
                </form>
            </div>
            @elseif ($pilihanMenu=='hapus')
            <div class="card border-secondary">
                <div class="card-header bg-danger text-white">
                    <strong>Hapus Pengguna</strong>
                </div>
                <div class="card-body">
                    <p>Apakah Anda yakin ingin menghapus {{ $produkTerpilih->nama }} ini?</p>
                    <button class="btn btn-danger" wire:click='hapus'>Ya, Hapus</button>
                    <button wire:click='batal' class="btn btn-secondary">Batal</button>
                </div>
            </div>
            @elseif ($pilihanMenu=='excel')
            <div class="intro-y box">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">
                        File Upload
                    </h2>
                </div>
                <div id="single-file-upload" class="p-5">
                    <div class="preview">
                        <form wire:submit='importExcel' data-single="true" action="/file-upload" class="dropzone dz-clickable">
                            <input type="file" class="form-control" wire:model="fileExcel">
                            <button class="btn btn-sm btn-primary mt-3" type="submit">Kirim</button>
                        </form>
                    </div>
                </div>
            </div>
            @endif
        </div>





    </div>