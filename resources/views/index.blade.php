@extends("layouts.Sections")
@section("Title" , "Listing")
@section("listing" , "active")

@section("Content")

<div id="kt_app_content_container" class="app-container container-xxl p-10">
    <!--begin::Products-->
    <div class="card card-flush ">
        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
            <!--begin::Card title-->
            <div class="card-title">
                <!--begin::Search-->
                <span class="svg-icon svg-icon-1 position-absolute ms-4"> Listing Products </span>
            </div>
            <!--end::Card title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                <a href="{{ route('Product_create') }}" class="btn btn-primary">Add Product</a>
                <!--end::Add product-->
            </div>
            <!--end::Card toolbar-->
        </div>
        <div class="card-body p-2">
            <!--begin::Table-->
            <table class="table table-row-dashed fs-6 gy-5" id="kt_ecommerce_sales_table">
                <!--begin::Table head-->
                <thead>
                    <!--begin::Table row-->
                    <tr>
                        <th class="text-center min-w-80px">ID</th>
                        <th class="text-center min-w-80px">Name </th>
                        <th class="text-center min-w-80px">Description</th>
                        <th class="text-center min-w-80px">Quantity</th>
                        <th class="text-center min-w-80px">Price</th>
                        <th class="text-center min-w-80px">Date Added</th>
                        <th class="text-center min-w-80px">Date Modified</th>
                        <th class="text-center min-w-80px">Actions</th>
                    </tr>
                    <!--end::Table row-->
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody class="fw-semibold text-gray-600">
                    @foreach ($data as $product )
                    
                    <!--begin::Table row-->
                    <tr>
                        <!--begin::Checkbox-->
                        <td class="text-center ">
                            <div class="text-gray-800 fw-bold">{{ $product->id }}</div>
                        </td>
                        <!--end::Order ID=-->
                        <!--begin::Customer=-->
                        <td class="text-center ">
                            <div class="text-gray-800 fs-5 fw-bold">{{ $product->Name }}</div>
                        </td>
                        <!--end::Customer=-->
                        <!--begin::Status=-->
                        <td class="text-center ">
                            <!--begin::Badges-->
                            <div>{{ Str::limit($product->Description, 40, '...') }}</div>
                            <!--end::Badges-->
                        </td>
                        <!--end::Status=-->
                        <!--begin::Status=-->
                        <td class="text-center ">
                            <!--begin::Badges-->
                            <div>{{ $product->Quantity }}</div>
                            <!--end::Badges-->
                        </td>
                        <!--end::Status=-->
                        <!--begin::Total=-->
                        <td class="text-center ">
                            <span class="fw-bold">{{ $product->Price }} $</span>
                        </td>
                        <!--end::Total=-->
                        <!--begin::Date Added=-->
                        <td class="text-center ">
                            <span class="fw-bold">{{ $product->created_at->todatestring() }}</span>
                        </td>
                        <!--end::Date Added=-->
                        <!--begin::Date Modified=-->
                        <td class="text-center ">
                            <span class="fw-bold">{{ $product->updated_at->todatestring() }}</span>
                        </td>
                        <!--end::Date Modified=-->
                        <!--begin::Action=-->
                        <td class="text-center ">
                            <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                            <span class="svg-icon svg-icon-5 m-0">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon--></a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="{{ route('Product_show' , $product->id) }}" class="menu-link px-3">View</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="{{ route('Product_edit' , $product->id ) }}" class="menu-link px-3">Edit</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="{{ route('Product_destroy' , $product->id ) }}" class="menu-link px-3" id="preconfirmed">Delete</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                        </td>
                        <!--end::Action=-->
                    </tr>

                    @endforeach
                </tbody>
                <!--end::Table body-->
            </table>
            <!--end::Table-->
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Products-->
</div>

@endsection
@section('delet')
<script>
    $(document).ready(function(){
        $('#preconfirmed').click(function(e){
            e.preventDefault();
            Swal.fire({
                title: 'Do you want to save the changes?',
                showCancelButton: true,
                confirmButtonText: 'Save',
                closeButtonText: `Don't save`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    window.location.href = $(this).attr('href');
                }
            })
        })
    });
</script>
@endsection