<!--start sidebar-->
<aside class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div class="logo-icon">
            <img src="{{ asset('assets/images/bssa-logo1.png') }}" class="logo-img" alt="">
        </div>
        <div class="logo-name flex-grow-1">
            <h5 class="mb-0">BSSA</h5>
        </div>
        <div class="sidebar-close">
            <span class="material-icons-outlined">close</span>
        </div>
    </div>
    <div class="sidebar-nav">
        <!--navigation-->
        <ul class="metismenu" id="sidenav">
            <li>
                <a href="{{ route('dashboard') }}" class="">
                    <div class="parent-icon"><i class="material-icons-outlined">home</i></div>
                    <div class="menu-title">Dashboard</div>
                </a>
            </li>
            
            @canany(['View Permission', 'View Role'])
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class="material-icons-outlined">lock</i>
                    </div>
                    <div class="menu-title">Roles & Permissions</div>
                </a>
                <ul>
                    @can('View Role')
                    <li>
                        <a href="{{ route('roles.index') }}"><i class="material-icons-outlined">arrow_right</i>Roles</a>
                    </li>
                    @endcan
                    @can('View Permission')
                    <li>
                        <a href="{{ route('permissions.index') }}"><i class="material-icons-outlined">arrow_right</i>Permissions</a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcanany

            @canany(['View Employee', 'Create Employee'])
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon">
                        <i class="material-icons-outlined">face_5</i>
                    </div>
                    <div class="menu-title">Employees</div>
                </a>
                <ul>
                    @can('Create Employee')
                    <li>
                        <a href="{{ route('employee.add') }}">
                            <i class="material-icons-outlined">arrow_right</i>Entry Employees
                        </a>
                    </li>
                    @endcan
                    @can('View Employee')
                    <li>
                        <a href="{{ route('employee') }}">
                            <i class="material-icons-outlined">arrow_right</i>Employees List
                        </a>
                    </li>
                    @endcan

                </ul>
            </li>
            @endcanany
            
            @canany(['Create Category', 'View Category', 'Create Fee Category', 'View Fee Category', 'Create Member Category','View Member Category','Create Expense Category','View Expense Category','Create Asset Category','View Asset Category'])
            <!-- categories -->
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="material-icons-outlined">widgets</i></div>
                    <div class="menu-title">All Categories</div>
                </a>
                <ul>

                    @canany(['View Category', 'Create Category'])
                    <li>
                        <a href="javascript:;" class="has-arrow">
                            <div class="parent-icon"><i class="material-icons-outlined">arrow_right</i></div>
                            <div class="menu-title">Categories</div>
                        </a>
                        <ul>
                            @can('Create Category')
                            <li><a href="{{ route('admin.category.create') }}"><i
                                        class="material-icons-outlined">arrow_right</i>Add Category</a>
                            </li>
                            @endcan
                            @can('View Category')
                            <li><a href="{{ route('admin.category.list') }}"><i
                                        class="material-icons-outlined">arrow_right</i>All Category</a>
                            </li>
                            @endcan
                        </ul>
                    </li>
                    @endcanany

                    @canany(['Create Member Category', 'View Member Category'])
                    <li>
                        <a href="javascript:;" class="has-arrow">
                            <div class="parent-icon"><i class="material-icons-outlined">arrow_right</i>
                            </div>
                            <div class="menu-title">Members Category</div>
                        </a>
                        <ul>
                            @can('Create Member Category')
                            <li><a href="{{ route('admin.member_category.create') }}"><i
                                        class="material-icons-outlined">arrow_right</i>Add Category</a>
                            </li>
                            @endcan
                            @can('View Member Category')
                            <li><a href="{{ route('admin.member_category.list') }}"><i
                                        class="material-icons-outlined">arrow_right</i>list</a>
                            </li>
                            @endcan
                        </ul>
                    </li>
                    @endcanany

                    @canany(['Create Fee Category', 'View Fee Category'])
                    <li>
                        <a class="has-arrow" href="javascript:;">
                            <div class="parent-icon"><i class="material-icons-outlined">arrow_right</i>
                            </div>
                            <div class="menu-title">Fees Category</div>
                        </a>
                        <ul>
                            @can('Create Fee Category')
                            <li><a href="{{ route('admin.fee_category.create') }}"><i
                                        class="material-icons-outlined">arrow_right</i>Add</a>
                            </li>
                            @endcan
                            @can('View Fee Category')
                            <li><a href="{{ route('admin.fee_category.list') }}"><i
                                        class="material-icons-outlined">arrow_right</i> List</a>
                            </li>
                            @endcan
                        </ul>
                    </li>
                    @endcanany
                    
                    @canany(['Create Expense Category', 'View Expense Category'])
                    <li>
                        <a class="has-arrow" href="javascript:;">
                            <div class="parent-icon"><i class="material-icons-outlined">arrow_right</i>
                            </div>
                            <div class="menu-title">Expense Category</div>
                        </a>
                        <ul>
                            @can('Create Expense Category')
                            <li>
                                <a href="{{ route('expense-category.create') }}">
                                    <i class="material-icons-outlined">arrow_right</i>Add
                                </a>
                            </li>
                            @endcan
                            @can('View Expense Category')
                            <li>
                                <a href="{{ route('expense-category.index') }}"><i class="material-icons-outlined">arrow_right</i> List</a>
                            </li>
                            @endcan
                        </ul>
                    </li>
                    @endcanany

                    @canany(['Create Asset Category', 'View Asset Category'])
                    <li>
                        <a class="has-arrow" href="javascript:;">
                            <div class="parent-icon"><i class="material-icons-outlined">arrow_right</i>
                            </div>
                            <div class="menu-title">Assets Category</div>
                        </a>
                        <ul>
                            @can('Create Asset Category')
                            <li><a href="{{ route('assets-category.create') }}"><i
                                        class="material-icons-outlined">arrow_right</i>Add</a>
                            </li>
                            @endcan
                            @can('View Asset Category')
                            <li><a href="{{ route('assets-category.index') }}"><i
                                        class="material-icons-outlined">arrow_right</i> List</a>
                            </li>
                            @endcan
                        </ul>
                    </li>
                    @endcanany
                </ul>
            </li>
            @endcanany

            {{--<li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="material-icons-outlined">widgets</i></div>
                    <div class="menu-title">Categories</div>
                </a>
                <ul>
                    <li><a href="{{ route('admin.category.create') }}"><i
                                class="material-icons-outlined">arrow_right</i>Add Category</a>
                    </li>
                    <li><a href="{{ route('admin.category.list') }}"><i
                                class="material-icons-outlined">arrow_right</i>All Category</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="material-icons-outlined">widgets</i>
                    </div>
                    <div class="menu-title">Members Category</div>
                </a>
                <ul>
                    <li><a href="{{ route('admin.member_category.create') }}"><i
                                class="material-icons-outlined">arrow_right</i>Add Category</a>
                    </li>
                    <li><a href="{{ route('admin.member_category.list') }}"><i
                                class="material-icons-outlined">arrow_right</i>list</a>
                    </li>
                </ul>
            </li>--}}

            @canany(['View Member', 'Create Member'])
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class="material-icons-outlined">person</i>
                    </div>
                    <div class="menu-title">Members</div>
                </a>
                <ul>
                    @can('Create Member')
                    <li><a href="{{ route('admin.members.create') }}"><i
                                class="material-icons-outlined">arrow_right</i>Entry Member</a>
                    </li>
                    @endcan
                    @can('View Member')
                    <li><a href="{{ route('admin.members.list') }}"><i
                                class="material-icons-outlined">arrow_right</i>Member List</a>
                    </li>
                    @endcan
                    @can('View Member')
                    <li>
                        <a href="{{ route('admin.members.payment-transactions') }}"><i
                        class="material-icons-outlined">arrow_right</i>Payments Transactions</a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcanany

            {{--<li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class="material-icons-outlined">apps</i>
                    </div>
                    <div class="menu-title">Fees Category</div>
                </a>
                <ul>
                    <li><a href="{{ route('admin.fee_category.create') }}"><i
                                class="material-icons-outlined">arrow_right</i>Add</a>
                    </li>
                    <li><a href="{{ route('admin.fee_category.list') }}"><i
                                class="material-icons-outlined">arrow_right</i> List</a>
                    </li>

                </ul>
            </li>--}}

            @canany(['Create Students', 'View Students', 'View Student Payment'])
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class="material-icons-outlined">sports_football</i>
                    </div>
                    <div class="menu-title">Students</div>
                </a>
                <ul>
                    @can('Create Students')
                    <li><a href="{{ route('admin.student.admission.create') }}"><i
                                class="material-icons-outlined">arrow_right</i>Admission</a>
                    </li>
                    @endcan
                    @can('View Students')
                    <li>
                        <a href="{{ route('admin.student.admission.list') }}">
                            <i class="material-icons-outlined">arrow_right</i> List
                        </a>
                    </li>
                    @endcan
                    @can('View Student Payment')
                    <li>
                        <a href="{{ route('admin.student.payment.index') }}">
                            <i class="material-icons-outlined">arrow_right</i> Payments
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcanany

            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class="material-icons-outlined">sports_football</i>
                    </div>
                    <div class="menu-title">Tournament</div>
                </a>
                <ul>
                    <li><a href="{{ route('tournament.create') }}"><i
                                class="material-icons-outlined">arrow_right</i>Create</a>
                    </li>
                    <li>
                        <a href="{{ route('tournament.index') }}">
                            <i class="material-icons-outlined">arrow_right</i> View List
                        </a>
                    </li>
                </ul>
            </li>

            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class="material-icons-outlined">sports_football</i>
                    </div>
                    <div class="menu-title">Club Registration</div>
                </a>
                <ul>
                    <li><a href="{{ route('club-registration.create') }}"><i
                                class="material-icons-outlined">arrow_right</i>Create</a>
                    </li>
                    <li>
                        <a href="{{ route('club-registration.index') }}">
                            <i class="material-icons-outlined">arrow_right</i> View List
                        </a>
                    </li>
                </ul>
            </li>

            @canany(['View Designation', 'Create Designation'])
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class="material-icons-outlined">view_agenda</i>
                    </div>
                    <div class="menu-title">Designation</div>
                </a>
                <ul>
                    @can('Create Designation')
                    <li><a href="{{ route('admin.designations.create') }}"><i
                                class="material-icons-outlined">arrow_right</i>Add</a>
                    </li>
                    @endcan
                    @can('View Designation')
                    <li><a href="{{ route('admin.designations.list') }}"><i
                                class="material-icons-outlined">arrow_right</i> List</a>
                    </li>
                    @endcan

                </ul>
            </li>
            @endcanany

            @canany(['View Committee', 'Create Committee'])
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class="material-icons-outlined">join_right</i>
                    </div>
                    <div class="menu-title">Commitee MGT</div>
                </a>
                <ul>
                    @can('Create Committee') 
                    <li><a href="{{ route('admin.comity.create') }}"><i
                                class="material-icons-outlined">arrow_right</i>Add</a>
                    </li>
                    @endcan
                    @can('View Committee')
                    <li><a href="{{ route('admin.comity.list') }}"><i class="material-icons-outlined">arrow_right</i>
                            List</a>
                    </li>
                    @endcan

                </ul>
            </li>
            @endcanany

            @canany(['View Committee Members', 'Create Committee Members'])
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class="material-icons-outlined">card_giftcard</i>
                    </div>
                    <div class="menu-title">Committees</div>
                </a>
                <ul>
                    @foreach (getAllCommitee() as $item)
                        <li><a href="{{route('admin.committe.members.list',$item->id)}}"><i
                                    class="material-icons-outlined">arrow_right</i>{{ $item->name }}</a>
                        </li>
                    @endforeach

                </ul>
            </li>
            @endcanany

            {{-- <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class="material-icons-outlined">apps</i>
                    </div>
                    <div class="menu-title">Expenses</div>
                </a>
                <ul>
                    <li>
                        <a href="{{ route('expenses.create') }}">
                            <i class="material-icons-outlined">arrow_right</i>Add
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('expenses.index') }}">
                            <i class="material-icons-outlined">arrow_right</i>List
                        </a>
                    </li>
                </ul>
            </li> --}}

            @canany(['View Balance Sheet', 'View Expense', 'View Asset'])
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class="material-icons-outlined">toc</i></div>
                    <div class="menu-title">Accounts</div>
                </a>
                <ul>
                    @can('View Asset')
                    <li>
                        <a href="{{ route('assets.index') }}" class="collapsible-header">
                            <i class="material-icons-outlined">arrow_right</i>
                            <span class="hide-menu"> Income</span>
                        </a>
                    </li>
                    @endcan

                    @can('View Expense')  
                    <li>
                        <a href="{{ route('expenses.index') }}" class="collapsible-header">
                            <i class="material-icons-outlined">arrow_right</i>
                            <span class="hide-menu"> Expenses</span>
                        </a>
                    </li>
                    @endcan

                    {{-- <li>
                        <a href="javascript:void(0)" class="collapsible-header">
                            <i class="material-icons-outlined">arrow_right</i>
                            <span class="hide-menu"> Purches</span>
                        </a>
                    </li> --}}
                    {{-- <li>
                        <a href="javascript:void(0)" class="collapsible-header">
                            <i class="material-icons-outlined">arrow_right</i>
                            <span class="hide-menu"> Sallaries</span>
                        </a>
                    </li> --}}
                    {{-- <li>
                        <a href="{{ route('accounts.profit-loss') }}" class="collapsible-header">
                            <i class="material-icons-outlined">arrow_right</i>
                            <span class="hide-menu"> Profit / Loss </span>
                        </a>
                    </li> --}}
                    {{-- <li>
                        <a href="javascript:void(0)" class="collapsible-header">
                            <i class="material-icons-outlined">arrow_right</i>
                            <span class="hide-menu"> Criditor / Dators </span>
                        </a>
                    </li> --}}
                    @can('View Balance Sheet')
                    <li>
                        <a href="{{ route('accounts.profit-loss') }}" class="collapsible-header">
                            <i class="material-icons-outlined">arrow_right</i>
                            <span class="hide-menu"> Balance Sheet </span>
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcanany

        </ul>
        <!--end navigation-->
    </div>
</aside>
<!--end sidebar-->
