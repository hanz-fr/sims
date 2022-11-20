@extends('layouts.admin')
@section('content')

<div class="tw-mx-10 tw-w-screen">
    <div class="tw-flex tw-mt-8">
        <a href="/admin/kelas"><i class="fa-solid fa-chevron-left tw-text-2xl tw-text-gray-400 hover:tw-text-gray-600"></i></a>
        <i class="fa-solid fa-shapes tw-text-sims-300 tw-text-2xl tw-ml-3"></i>
        <div class="tw-text-2xl tw-ml-3 tw-font-pop tw-font-semibold tw-text-gray-300">Detail Kelas</div>
    </div>

    <div class="tw-overflow-hidden tw-shadow-md tw-mt-14 tw-rounded-xl">
        <div class="tw-flex tw-bg-[#5A6C7C] tw-py-8 tw-pl-12">
            <div class="tw-bg-white tw-rounded-2xl tw-p-5">
                <img src="https://www.smkn11bdg.sch.id/src/images/11.png" class="tw-w-[117px] tw-h-[138px]" alt="">
            </div>
            <div class="tw-flex tw-flex-col tw-text-white tw-ml-8 tw-my-12">
              <div class="tw-flex-col">
                <span class="tw-text-lg">Kelas</span>
              </div>

              <div class="tw-flex-col">
                <span class="tw-font-bold tw-text-2xl">XII</span>
                <span class="tw-font-bold tw-text-2xl">TKJ</span>
                <span class="tw-font-bold tw-text-2xl">2</span>
              </div>

            </div>
        </div>
        <div class="tw-p-12">
            <h1 class="tw-text-admin-400 tw-font-bold tw-text-xl tw-mb-3">Desc</h1>
            <p class="tw-grid tw-gap-2 tw-grid-cols-2 tw-text-gray-300 tw-font-bold">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed ipsa eligendi nesciunt recusandae facilis dolore, vitae ut voluptates repudiandae, provident vel obcaecati ab at expedita beatae sequi aut, quasi saepe necessitatibus laborum placeat tempora! Rerum quo nisi laboriosam excepturi possimus officiis incidunt neque maiores veniam autem sint repudiandae nemo molestias blanditiis itaque.</p>
            <div class="tw-mt-2 tw-text-end">
                <p class="tw-text-admin-400 tw-font-bold tw-mb-3">Created : <span class="tw-text-admin-300 tw-font-normal">12 Februari 2023</span></p>
                <p class="tw-text-admin-400 tw-font-bold">Updated : <span class="tw-text-admin-300 tw-font-normal">15 Februari 2023</span></p>
            </div>  
        </div>
    </div>

    <div class="tw-flex tw-justify-end tw-mt-5">
        <div class="tw-flex tw-gap-5 tw-font-ubuntu tw-text-white tw-font-medium">
          <form action="" method="POST" class="tw-bg-[#FF7575] tw-rounded-lg hover:tw-bg-salmon-600">
            {{-- @csrf
            @method('DELETE') --}}
            <button type="submit" class="tw-py-4 tw-px-16">Delete kelas</button>
          </form>
          <a href="/admin/kelas/edit" class="tw-bg-[#FFCF86] hover:tw-bg-[#ffba51] tw-py-4 tw-px-16 tw-rounded-lg">Edit kelas</a>
        </div>
      </div>
</div>


@endsection