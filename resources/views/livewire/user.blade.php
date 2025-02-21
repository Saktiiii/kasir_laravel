<div>

    <div>
        @if ($pilihanMenu=='lihat')
        <!-- BEGIN: Content -->
        <div class="content">
            <h2 class="intro-y text-lg font-medium mt-5">
                Users
            </h2>
            <div class="grid grid-cols-12 gap-6 mt-5">
                <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
                    <button wire:click="pilihMenu('tambah')" class="btn btn-primary shadow-md mr-2 {{ $pilihanMenu=='tambah' }}">Add New User</button>
                    <div class="dropdown">
                        <button class="dropdown-toggle btn px-2 box" aria-expanded="false" data-tw-toggle="dropdown">
                            <span class="w-5 h-5 flex items-center justify-center">
                                <i data-lucide="plus"></i>
                            </span>
                        </button>
                        <div class="dropdown-menu w-40">
                            <ul class="dropdown-content">
                                <li>
                                    <a href="#" class="dropdown-item">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users w-4 h-4 mr-2">
                                            <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"></path>
                                            <circle cx="9" cy="7" r="4"></circle>
                                            <path d="M23 21v-2a4 4 0 00-3-3.87"></path>
                                            <path d="M16 3.13a4 4 0 010 7.75"></path>
                                        </svg>
                                        Add Group
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-message-circle w-4 h-4 mr-2">
                                            <path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"></path>
                                        </svg>
                                        Send Message
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="hidden md:block mx-auto text-slate-500"></div>
                    <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                        <div class="w-56 relative text-slate-500">
                            <input type="text" class="form-control w-56 box pr-10" placeholder="Search...">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0">
                                <circle cx="11" cy="11" r="8"></circle>
                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- BEGIN: Users Layout -->
                @foreach ($semuaPengguna as $pengguna)
                <div class="intro-y col-span-12 md:col-span-6">
                    <div class="box">
                        <div class="flex flex-col lg:flex-row items-center p-5">
                            <div class="w-26h-24 mt-5 ml-3 lg:w-12 lg:h-12 image-fit lg:mr-1">
                                <i data-lucide="users"></i>
                            </div>
                            <div class="lg:ml-2 lg:mr-auto text-center lg:text-left mt-3 lg:mt-0">
                                <a href="#" class="font-medium">{{ $pengguna->name }}</a>
                                <div class="text-slate-500 text-xs mt-0.5">{{ $pengguna->peran }}</div>
                            </div>
                            <div class="flex mt-4 lg:mt-0">
                                <button wire:click="pilihEdit({{ $pengguna->id }})" class="btn btn-primary py-1 px-2 mr-2">Edit</button>
                                <button wire:click="pilihHapus({{ $pengguna->id }})" class="btn btn-outline-secondary py-1 px-2">Hapus</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- END: Users Layout -->

                <!-- BEGIN: Pagination -->
                <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
                   
                       
                    <select class="w-20 form-select box mt-3 sm:mt-0">
                        <option>10</option>
                        <option>25</option>
                        <option>35</option>
                        <option>50</option>
                    </select>
                </div>
                <!-- END: Pagination -->
            </div>
        </div>
        <!-- END: Content -->
        @elseif ($pilihanMenu=='tambah')
        <div class="card border-secondary">
            <div class="card-header bg-secondary text-white">
                <strong class="text-primary">Tambah User</strong>
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
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" wire:model='email' />
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" wire:model='password' />
                        @error('password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="peran" class="form-label">Peran</label>
                        <select wire:model='peran' class="form-select">
                            <option value="Admin"><strong> -- Pilih Peran --</strong></option>
                            <option value="Admin">Admin</option>
                            <option value="Kasir">Kasir</option>
                        </select>
                        @error('peran')
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
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" wire:model='email' />
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="peran" class="form-label">Peran</label>
                        <select wire:model='peran' class="form-select">
                            <option value="Admin"><strong> -- Pilih Peran --</strong></option>
                            <option value="Admin">Admin</option>
                            <option value="Kasir">Kasir</option>
                        </select>
                        @error('peran')
                        <span class="text-danger">{{ $message }} </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    <button type="button" wire:click='batal' class="btn btn-outline-primary">Batal</button>
                </form>
            </div>
        </div>
        @elseif ($pilihanMenu=='hapus')
        <div class="card border-secondary">
            <div class="card-header bg-danger text-white">
                <strong>Hapus Pengguna</strong>
            </div>
            <div class="card-body">
                <p>Apakah Anda yakin ingin menghapus {{ $penggunaTerpilih->name }} ini?</p>
                <button class="btn btn-danger" wire:click='hapus'>Ya, Hapus</button>
                <button wire:click='batal' class="btn btn-secondary">Batal</button>
            </div>
        </div>
        @endif
    </div>
</div>


</div>