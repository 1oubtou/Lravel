@extends("layouts.Sections")
@section("Title" , "welcome")
@section("listing" , "active")

@section("Content")


<div class="card card-flush p-10 m-10">
    <!--begin::Card header-->
    <div class="card-header">
        <div class="card-title">
            <h2>Delivery Details</h2>
        </div>
    </div>
    <!--end::Card header-->
    <form action="{{ route('Product_update' , $Product_id->id ) }}" method="POST">
        @csrf
        <!--begin::Card body-->
        <div class="card-body pt-0">
            <!--begin::Billing address-->
            <div class="d-flex flex-column gap-5 gap-md-7">
                <!--begin::Input group-->
                <div class="d-flex flex-column flex-md-row gap-5">
                    <div class="flex-row-fluid">
                        <!--begin::Label-->
                        <label class="form-label">Name</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input class="form-control" name="name_p" placeholder="Name" value="{{ $Product_id->Name }}" />
                        <!--end::Input-->
                    </div>
                    <div class="fv-row flex-row-fluid">
                        <!--begin::Label-->
                        <label class="form-label">Price</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="number" class="form-control" name="price_p" placeholder="Price" value="{{ $Product_id->Price }}" />
                        <!--end::Input-->
                    </div>
                    <div class="fv-row flex-row-fluid">
                        <!--begin::Label-->
                        <label class="form-label">Quantity</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="number" class="form-control" name="quantity_p" placeholder="Quantity" value="{{ $Product_id->Quantity }}" />
                        <!--end::Input-->
                    </div>
                </div>
                <div class="d-flex flex-column flex-md-row gap-5">
                    <div class="fv-row flex-row-fluid">
                        <!--begin::basic autosize textarea-->
                        <label for="" class="form-label">Description</label>
                        <textarea class="form-control" name="description_p" data-kt-autosize="true">{{ $Product_id->Description }}</textarea>
                    </div>
                </div>
                <!--end::Input group-->
                <div>
                    <button type="submit" class="btn btn-primary" id="preconfirmed">Save</button>
                </div>
            </div>
            <!--end::Billing address-->
        </div>
        <!--end::Card body-->
    </form>
</div>
@endsection
@section('delet')

<script>
    $(document).ready(function(){
        $('#preconfirmed').click(function(){
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Your work has been saved',
                showConfirmButton: false,
                timer: 1500
            })
        })
    });
</script>
    
@endsection