<x-layout>
    <x-section name="styles">
        <!-- Some JS and styles -->
        <title>Hello World</title>
    </x-section>


    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <x-sidebar></x-sidebar>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <x-topbar></x-topbar>
                <!-- End of Topbar -->


                <div class="container-fluid">
                    <x-response></x-response>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 flex">
                            <h6 class="m-0 font-weight-bold d-inline text-primary">Orders</h6>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>S. No.</th>
                                            <th>Bracket</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Created At</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>S. No.</th>
                                            <th>Bracket</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Created At</th>
                                            <th>Status</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @php($i = 1)
                                        @forelse ($drawerOrder as $order)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $order->bracket }}</td>
                                                <td>{{ $order->quantity }}</td>
                                                <td>{{ $order->price }}</td>
                                                <td>{{ $order->created_at }}</td>
                                                <td>
                                                    <a href="" class="text-decoration-none text-body">

                                                        @if ($order->status == 0)
                                                            Pending
                                                        @elseif($order->status == 1)
                                                            Processing
                                                        @else
                                                            Completed
                                                        @endif
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5">No Data Available</td>
                                            </tr>
                                        @endforelse
                                        <tr></tr>
                                    </tbody>

                                </table>
                            </div>
                            <div class="d-flex justify-content-center">
                                {{ $drawerOrder->links() }}
                            </div>
                        </div>
                    </div>



                    {{-- Select Options --}}
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 flex">
                            <h6 class="m-0 font-weight-bold d-inline text-primary">Index Page Select Options</h6>

                        </div>

                        <div class="card-body">
                            <form action="{{ route('select.option') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="">Option</label>
                                    <input type="text" name="option" id="" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Price</label>
                                    <input type="text" name="price" id="" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Option For</label>
                                    <select name="for" class="form-control">
                                        <option disabled selected>--SELECT--</option>
                                        <option value="0">Bracket</option>
                                        <option value="1">Front Notch</option>
                                        <option value="2">Back Notch</option>
                                        <option value="3">Bottom Thickness</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Create Option</button>
                                </div>
                            </form>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>S. No.</th>
                                            <th>Option</th>
                                            <th>Price</th>
                                            <th>For</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>S. No.</th>
                                            <th>Option</th>
                                            <th>Price</th>
                                            <th>For</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @php($i = 1)
                                        @forelse ($selectOptions as $option)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $option->option }}</td>
                                                <td>${{ $option->price }}</td>
                                                <td>
                                                    @if ($option->for == 0)
                                                        {{ __('Bracket') }}
                                                    @elseif ($option->for == 1)
                                                        {{ __('Front Notch') }}
                                                    @elseif ($option->for == 2)
                                                        {{ __('Back Notch') }}
                                                    @else
                                                        {{ __('Bottom Thickness') }}
                                                    @endif
                                                </td>
                                                <td>
                                                    <form action="{{ route('select.option.destroy', $option->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>

                                        @empty
                                            <tr>
                                                <td colspan="3">No Data Here</td>
                                            </tr>
                                        @endforelse
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3 flex">
                            <h6 class="m-0 font-weight-bold d-inline text-primary">Custom Options</h6>

                        </div>

                        <div class="card-body">
                            <form action="{{ route('custom') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="">Code</label>
                                    <input type="hidden" name="code" value="0">
                                    <input type="checkbox" name="code" value="1"
                                        {{ custom()->code == 1 ? 'checked' : '' }}>
                                </div>
                                <div class="form-group">
                                    <label for="">Markup Price</label>
                                    <input type="number" name="markup_price" value="{{ custom()->markup_price }}"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-warning">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->





            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <x-footer></x-footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <x-section name="scripts">
        <!-- Some JS and styles -->



    </x-section>
</x-layout>
