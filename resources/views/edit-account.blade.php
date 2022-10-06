@extends('layouts.admin')

@section('content')
<div class="tw-mx-10 tw-w-screen tw-h-screen"> 
  
  {{-- modal --}}
  {{-- <div x-show="show" class="tw-grid tw-place-items-center tw-items-center tw-w-full tw-fixed tw-my-40">
      <div @click.away="show = false" class="tw-w-1/4 -tw-ml-64 tw-rounded-lg tw-shadow-xl tw-bg-gray-50 tw-py-2 tw-px-3 tw-relative tw-appearance-none tw-border-2 tw-border-gray-300 tw-border-solid hover:tw-shadow-outline-gray">
        <div x-data="{ files: null }" id="FileUpload" class="">
            <label class="tw-flex tw-flex-col tw-w-full tw-h-56 tw-border-4 tw-border-admin-200 tw-border-dashed tw-justify-center tw-items-center hover:tw-bg-gray-100 hover:tw-border-gray-300 tw-px-10" for="">
              <input type="file" multiple
                   class="tw-absolute tw-inset-0 tw-z-50 tw-m-0 tw-p-0 tw-w-full tw-h-full tw-outline-none tw-opacity-0"
                   x-on:change="files = $event.target.files; console.log($event.target.files);"
                   x-on:dragover="$el.classList.add('active')" x-on:dragleave="$el.classList.remove('active')" x-on:drop="$el.classList.remove('active')"
                >
            
                <template x-if="files !== null">
                    <div class="tw-flex tw-flex-col tw-space-y-1">
                        <template x-for="(_,index) in Array.from({ length: files.length })">
                            <div class="tw-flex tw-flex-row tw-items-center tw-space-x-2">
                                <template x-if="files[index].type.includes('audio/')"><i class="far fa-file-audio fa-fw"></i></template>
                                <template x-if="files[index].type.includes('application/')"><i class="far fa-file-alt fa-fw"></i></template>
                                <template x-if="files[index].type.includes('image/')"><i class="far fa-file-image fa-fw"></i></template>
                                <template x-if="files[index].type.includes('video/')"><i class="far fa-file-video fa-fw"></i></template>
                                <span class="tw-font-medium tw-text-gray-400" x-text="files[index].name">Uploading</span>
                                <span class="tw-text-xs tw-self-end tw-text-gray-400" x-text="filesize(files[index].size)">...</span>
                            </div>
                        </template>
                    </div>
                </template>
                <template x-if="files === null">
                    <div class="tw-flex tw-flex-col tw-space-y-2 tw-items-center tw-justify-center">
                      <svg  @click="show=false" xmlns="http://www.w3.org/2000/svg" class="tw-w-8 tw-h-8 tw-text-gray-400 group-hover:tw-text-gray-600"
                      fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                    </svg>
                        <p class="tw-text-gray-700">Drag your files here or click in this area.</p>
                    </div>
                </template>
          </label>
          <div class="tw-flex tw-justify-center tw-p-2">
            <button class="tw-w-full tw-px-5 tw-py-2 tw-text-white tw-bg-admin-300 tw-rounded tw-shadow-xl">Create</button>
        </div>
        </div>
    </div>
  </div> --}}

  <div class="tw-flex tw-flex-col tw-mt-8 tw-gap-8">
    <div class="tw-flex tw-items-center">
      <a href="/show-detail">
        <i class="fa-solid fa-chevron-left tw-text-gray-400 tw-text-2xl"></i>
      </a>
      <i class="fa-solid fa-user tw-text-admin-300 tw-text-3xl tw-ml-5"></i>
      <div class="tw-text-2xl tw-ml-4 tw-font-pop tw-font-semibold tw-text-gray-300">Edit Account</div>
    </div>
    <form action="" method="POST">
      @csrf
    <div class="tw-bg-white tw-rounded-xl tw-border-l-[17px] tw-border-admin-300 tw-py-20 tw-pl-10 tw-font-pop shadow-cs">
      <div class="tw-flex  tw-w-full tw-items-center">
        {{-- @if()
        <img src="" alt="Pas Foto" srcset="" class="tw-rounded-xl tw-mb-10 tw-w-48 tw-h-52 tw-border tw-border-slate-400 tw-mx-auto md:tw-mt-20 sm:tw-mt-10">
        @else --}}
        {{-- <div class="tw-flex tw-flex-col">
          <div class="tw-bg-admin-300 tw-p-2 tw-rounded-2xl tw-text-white tw-w-60 tw-h-56 tw-items-center tw-flex tw-justify-center"><i class="fa-solid fa-user tw-text-9xl"></i></div>
          <div x-data="{}" class="tw-flex tw-justify-end">
            <a href="#" @click="show=true" class="tw-bg-[#5A6C7C] -tw-mt-9 -tw-mr-4 tw-absolute tw-float-right  tw-text-white tw-py-2 tw-px-4 tw-rounded-xl"><i class="fa-solid fa-file-image tw-text-2xl"></i></a>
          </div>
        </div> --}}
        {{-- @endif --}}
          <div class="tw-flex tw-flex-col tw-px-24 tw-w-full">
            <div class="tw-flex tw-flex-wrap tw-justify-between tw-w-full tw-mb-6">
              <div class="tw-w-1/2 tw-pr-10 tw-mb-6 md:tw-mb-0 tw-font-ubuntu">
                <label class="tw-text-admin-300 tw-font-bold tw-ml-3 tw-text-lg" for="nip">
                  NIP
                </label>
                <input value="" class="input-account" id="nip" name="nip" type="number" required>
              </div>
              <div class="tw-w-1/2 tw-px-3 tw-mb-6 md:tw-mb-0 tw-font-ubuntu">
                <label class="tw-text-admin-300 tw-font-bold tw-ml-3 tw-text-lg" for="email">
                  Email
                </label>
                <input value="" class="input-account" id="email" name="email" type="email" required>
              </div>
            </div>
            <div class="tw-flex tw-flex-wrap tw-justify-between tw-w-full tw-mb-6">
              <div class="tw-w-1/2 tw-pr-10 tw-mb-6 md:tw-mb-0 tw-font-ubuntu tw-text-lg">
                <label class="tw-text-admin-300 tw-font-bold tw-ml-3" for="nama">
                  Nama
                </label>
                <input value="" class="input-account" id="nama" name="nama" type="text" required>
              </div>
              <div class="tw-w-1/2 tw-px-3 tw-mb-6 md:tw-mb-0 tw-font-ubuntu">
                <label class="tw-text-admin-300 tw-font-bold tw-ml-3 tw-text-lg" for="password">
                  Password
                </label>
                <input value="" class="input-account" id="password" name="password" type="password" required>
              </div>
            </div>
            <div class="tw-w-1/2 tw-pr-10 tw-mb-6 md:tw-mb-0 tw-font-ubuntu">
              <label class="tw-text-admin-300 tw-font-bold tw-ml-3 tw-text-lg" for="role">
                Role
              </label>
              <select value="" class="input-account" id="nip" name="role" type="text" required>
                <option value="Tata Usaha">Tata Usaha</option>
                <option value="Kesiswaan">Kesiswaan</option>
                <option value="Kurikulum">Kurikulum</option>
                <option value="Walikelas">Wali Kelas</option>
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="tw-float-right tw-flex tw-justify-end tw-mt-12">
        <button type="submit" class="tw-bg-[#90C2C2] hover:tw-bg-sims-400 tw-mr-8 tw-py-5 tw-px-16 tw-text-white tw-font-ubuntu tw-rounded-lg">Save Changes</button>
      </div>
    </form>
  </div>
  
</div>
@endsection

@push('scripts')
<script src="https://unpkg.com/create-file-list"></script>
<script>
function dataFileDnD() {
    return {
        files: [],
        fileDragging: null,
        fileDropping: null,
        humanFileSize(size) {
            const i = Math.floor(Math.log(size) / Math.log(1024));
            return (
                (size / Math.pow(1024, i)).toFixed(2) * 1 +
                " " +
                ["B", "kB", "MB", "GB", "TB"][i]
            );
        },
        remove(index) {
            let files = [...this.files];
            files.splice(index, 1);

            this.files = createFileList(files);
        },
        drop(e) {
            let removed, add;
            let files = [...this.files];

            removed = files.splice(this.fileDragging, 1);
            files.splice(this.fileDropping, 0, ...removed);

            this.files = createFileList(files);

            this.fileDropping = null;
            this.fileDragging = null;
        },
        dragenter(e) {
            let targetElem = e.target.closest("[draggable]");

            this.fileDropping = targetElem.getAttribute("data-index");
        },
        dragstart(e) {
            this.fileDragging = e.target
                .closest("[draggable]")
                .getAttribute("data-index");
            e.dataTransfer.effectAllowed = "move";
        },
        loadFile(file) {
            const preview = document.querySelectorAll(".preview");
            const blobUrl = URL.createObjectURL(file);

            preview.forEach(elem => {
                elem.onload = () => {
                    URL.revokeObjectURL(elem.src); // free memory
                };
            });

            return blobUrl;
        },
        addFiles(e) {
            const files = createFileList([...this.files], [...e.target.files]);
            this.files = files;
            this.form.formData.files = [...files];
        }
    };
}
</script>
@endpush