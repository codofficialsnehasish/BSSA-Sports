<!--start sidebar-->
<aside class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div class="logo-icon">
            <img src="{{ asset('assets/images/logo-icon.png') }}" class="logo-img" alt="">
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
            
            <!-- categories -->
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="material-icons-outlined">widgets</i></div>
                    <div class="menu-title">All Categories</div>
                </a>
                <ul>
                    <li>
                        <a href="javascript:;" class="has-arrow">
                            <div class="parent-icon"><i class="material-icons-outlined">arrow_right</i></div>
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
                            <div class="parent-icon"><i class="material-icons-outlined">arrow_right</i>
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
                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:;">
                            <div class="parent-icon"><i class="material-icons-outlined">arrow_right</i>
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
                    </li>
                </ul>
            </li>

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

            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class="material-icons-outlined">person</i>
                    </div>
                    <div class="menu-title">Members</div>
                </a>
                <ul>
                    <li><a href="{{ route('admin.members.create') }}"><i
                                class="material-icons-outlined">arrow_right</i>Entry Member</a>
                    </li>
                    <li><a href="{{ route('admin.members.list') }}"><i
                                class="material-icons-outlined">arrow_right</i>Member List</a>
                    </li>

                </ul>
            </li>

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

            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class="material-icons-outlined">sports_football</i>
                    </div>
                    <div class="menu-title">Students</div>
                </a>
                <ul>
                    <li><a href="{{ route('admin.student.admission.create') }}"><i
                                class="material-icons-outlined">arrow_right</i>Admission</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.student.admission.list') }}">
                            <i class="material-icons-outlined">arrow_right</i> List
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.student.payment.index') }}">
                            <i class="material-icons-outlined">arrow_right</i> Payments
                        </a>
                    </li>
                </ul>
            </li>

            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class="material-icons-outlined">apps</i>
                    </div>
                    <div class="menu-title">Designation</div>
                </a>
                <ul>
                    <li><a href="{{ route('admin.designations.create') }}"><i
                                class="material-icons-outlined">arrow_right</i>Add</a>
                    </li>
                    <li><a href="{{ route('admin.designations.list') }}"><i
                                class="material-icons-outlined">arrow_right</i> List</a>
                    </li>

                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class="material-icons-outlined">apps</i>
                    </div>
                    <div class="menu-title">Commitee MGT</div>
                </a>
                <ul>
                    <li><a href="{{ route('admin.comity.create') }}"><i
                                class="material-icons-outlined">arrow_right</i>Add</a>
                    </li>
                    <li><a href="{{ route('admin.comity.list') }}"><i class="material-icons-outlined">arrow_right</i>
                            List</a>
                    </li>

                </ul>
            </li>

            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class="material-icons-outlined">apps</i>
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

            <li>
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
            </li>

            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class="material-icons-outlined">apps</i></div>
                    <div class="menu-title">Accounts</div>
                </a>
                <ul>
                    <li>
                        <a href="{{ route('assets') }}" class="collapsible-header">
                            <i class="material-icons-outlined">arrow_right</i>
                            <span class="hide-menu"> Assets</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('purches') }}" class="collapsible-header">
                            <i class="material-icons-outlined">arrow_right</i>
                            <span class="hide-menu"> Purches</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('sallaries') }}" class="collapsible-header">
                            <i class="material-icons-outlined">arrow_right</i>
                            <span class="hide-menu"> Sallaries</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('missniliyes') }}" class="collapsible-header">
                            <i class="material-icons-outlined">arrow_right</i>
                            <span class="hide-menu"> Missniliyes exp </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('profit-loss') }}" class="collapsible-header">
                            <i class="material-icons-outlined">arrow_right</i>
                            <span class="hide-menu"> Profit / Loss </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('criditor-dators') }}" class="collapsible-header">
                            <i class="material-icons-outlined">arrow_right</i>
                            <span class="hide-menu"> Criditor / Dators </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('balance-sheet') }}" class="collapsible-header">
                            <i class="material-icons-outlined">arrow_right</i>
                            <span class="hide-menu"> Balance Sheet </span>
                        </a>
                    </li>
                </ul>
            </li>


        </ul>
        <!--end navigation-->
    </div>
</aside>
<!--end sidebar-->
