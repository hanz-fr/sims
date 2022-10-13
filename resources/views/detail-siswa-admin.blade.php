@extends('layouts.admin')

@section('content')

<div class="tw-m-10 tw-w-screen tw-flex">
   <div class="tw-flex tw-flex-col tw-gap-8">
            <li class="card-data-white">
                  <div class="tw-flex tw-bg-[#5A6C7C] tw-font-ubuntu tw-text-white tw-rounded-xl tw-gap-8 tw-py-16 tw-px-12">
                     <div class="tw-flex tw-flex-col">
                        <i class="fa-solid fa-user tw-text-5xl tw-mx-auto"></i>
                     </div>
                  </div>
                  <div class="tw-flex tw-flex-col tw-px-7 tw-py-7">
                    <table>
                        <tbody class="tw-text-left tw-font-ubuntu tw-text-[#B4B8BC] tw-font-bold">
                        <tr>
                           <th class="tw-font-normal tw-pb-1.5">latest data created</th>
                           <td class="tw-text-white tw-text-right tw-pl-3">2 days ago</td>
                        </tr>
                        <tr>
                           <th class="tw-font-normal tw-pb-1.5">recent activity</th>
                           <td class="tw-text-white tw-text-right">create</td>
                        </tr>
                        <tr>
                           <th class="tw-font-normal">latest data</th>
                           <td class="tw-text-white tw-text-right">TKJ</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </li>

            <li class="card-data-white">
                  <div class="tw-flex tw-bg-[#90C2C2] tw-font-ubuntu tw-text-white tw-rounded-xl tw-gap-8 tw-py-16 tw-px-12">
                     <div class="tw-flex tw-flex-col">
                        <i class="fa-solid fa-shapes tw-text-5xl tw-mx-auto"></i>
                        <div class="tw-font-medium tw-text-xl">Jurusan</div>
                     </div>
                     <div class="tw-flex">
                        <div class="tw-font-medium tw-text-4xl">20</div>
                        <div class="tw-text-sm tw-ml-2">total <br> data</div>
                     </div>
                  </div>
                  <div class="tw-flex tw-flex-col tw-px-7 tw-py-7">
                    <table>
                        <tbody class="tw-text-left tw-font-ubuntu tw-text-[#B4B8BC] tw-font-bold">
                        <tr>
                           <th class="tw-font-normal tw-pb-1.5">latest data created</th>
                           <td class="tw-text-white tw-text-right tw-pl-3">2 days ago</td>
                        </tr>
                        <tr>
                           <th class="tw-font-normal tw-pb-1.5">recent activity</th>
                           <td class="tw-text-white tw-text-right">create</td>
                        </tr>
                        <tr>
                           <th class="tw-font-normal">latest data</th>
                           <td class="tw-text-white tw-text-right">TKJ</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </li>
   </div>
</div>

@endsection