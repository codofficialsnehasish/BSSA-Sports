<aside class="left-sidebar">
    <ul id="slide-out" class="sidenav">
        <li>
            <ul class="collapsible">
                <li class="small-cap"><span class="hide-menu">PERSONAL</span></li>
                <li>
                    <a href="{{ route('dashboard') }}" class="collapsible-header"><i class="material-icons">dashboard</i><span class="hide-menu"> Dashboard</span></a>
                </li>
                <li class="small-cap"><span class="hide-menu">MEMBERS</span></li>
                <li>
                    <a href="javascript: void(0);" class="collapsible-header has-arrow"><i class="material-icons">add_to_photos</i><span class="hide-menu"> Members Category </span></a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="{{ route('member-category.create') }}"><i class="fas fa-plus"></i><span class="hide-menu">Add Category</span></a></li>
                            <li><a href="{{ route('member-category.index') }}"><i class="fas fa-list-ol"></i><span class="hide-menu">All Category</span></a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="javascript: void(0);" class="collapsible-header has-arrow"><i class="material-icons">assignment_ind</i><span class="hide-menu"> Members </span></a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="{{ route('members.create') }}"><i class="fas fa-plus"></i><span class="hide-menu">Entry Member</span></a></li>
                            <li><a href="{{ route('members.index') }}"><i class="fas fa-list-ol"></i><span class="hide-menu">Member List</span></a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="javascript: void(0);" class="collapsible-header has-arrow"><i class="material-icons">payment</i><span class="hide-menu"> Fees</span></a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="{{ route('fees.index') }}"><i class="fas fa-plus"></i><span class="hide-menu">Fee Collection</span></a></li>
                            <li><a href="{{ route('fees.due-list') }}"><i class="fas fa-calendar-times"></i><span class="hide-menu">Fee Due List</span></a></li>
                            <li><a href="{{ route('fees.collection-history') }}"><i class="fas fa-history"></i><span class="hide-menu">Fee Collection History</span></a></li>
                        </ul>
                    </div>
                </li>
                <li class="small-cap"><span class="hide-menu">CAMP</span></li>
                <li>
                    <a href="{{ route('admission.index') }}" class="collapsible-header"><i class="material-icons">add_to_queue</i><span class="hide-menu"> Admission</span></a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="collapsible-header has-arrow"><i class="material-icons">card_membership</i><span class="hide-menu"> Fees</span></a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="{{ route('admission.fees-collection') }}"><i class="fas fa-plus"></i><span class="hide-menu">Fee Collection</span></a></li>
                            <li><a href="{{ route('admission.fees-collection-history') }}"><i class="fas fa-history"></i><span class="hide-menu">Fee Collection History</span></a></li>
                        </ul>
                    </div>
                </li>
                <li class="small-cap"><span class="hide-menu">ACCOUNTS</span></li>
                <li>
                    <a href="{{ route('assets') }}" class="collapsible-header"><i class="material-icons">fast_forward</i><span class="hide-menu"> Assets</span></a>
                </li>
                <li>
                    <a href="{{ route('purches') }}" class="collapsible-header"><i class="material-icons">fast_forward</i><span class="hide-menu"> Purches</span></a>
                </li>
                <li>
                    <a href="{{ route('sallaries') }}" class="collapsible-header"><i class="material-icons">fast_forward</i><span class="hide-menu"> Sallaries</span></a>
                </li>
                <li>
                    <a href="{{ route('missniliyes') }}" class="collapsible-header"><i class="material-icons">fast_forward</i><span class="hide-menu"> Missniliyes exp </span></a>
                </li>
                <li>
                    <a href="{{ route('profit-loss') }}" class="collapsible-header"><i class="material-icons">fast_forward</i><span class="hide-menu"> Profit / Loss </span></a>
                </li>
                <li>
                    <a href="{{ route('criditor-dators') }}" class="collapsible-header"><i class="material-icons">fast_forward</i><span class="hide-menu"> Criditor / Dators </span></a>
                </li>
                <li>
                    <a href="{{ route('balance-sheet') }}" class="collapsible-header"><i class="material-icons">account_balance</i><span class="hide-menu"> Balance Sheet </span></a>
                </li>
            </ul>
        </li>
    </ul>
</aside>