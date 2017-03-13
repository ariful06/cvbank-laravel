<div class="sidebar-category sidebar-category-visible">
    <div class="category-content no-padding">
        <ul class="navigation navigation-main navigation-accordion">

            <!-- Main -->
            <li class="navigation-header"><span>Main</span> <i class="icon-home"
                                                               title="Main pages"></i></li>
            <li class=""><a href="{{url('/dashboard')}}"><i class="icon-home5"></i> <span>Dashboard</span></a>
            </li>
            <li>
                <a href="{{url('/settings/view')}}"><i class="icon-cog3"></i> <span>Settings</span></a>
                <ul>
                    <li><a href="{{url('/settings/view')}}">View</a></li>
                </ul>
            </li>


            <li class="@yield('about-select')">
                <a href="#"><i class="icon-stack-empty active"></i> <span>About</span></a>
                <ul>
                    <li><a href="{{url('dashboard/about')}}" id="layout2">View</a></li>

                    <li class="@yield('hobbies-select')"><a href="#"><i class="icon-magic-wand"></i>Hobbies</a>
                        <ul>
                            <li><a href="{{url('/dashboard/hobbies/')}}">View All</a></li>
                            <li><a href="{{url('/dashboard/hobbies/create')}}">Add New Hobby</a></li>
                        </ul>
                    </li>
                    
                    <li class="@yield('fact-select')"><a href="#"><i class="icon-database-diff"></i>Facts</a>
                        <ul>
                            <li><a href="{{url('dashboard/fact/')}}">View All</a></li>
                            <li><a href="{{url('dashboard/fact/create')}}">Add New Facts</a></li>
                        </ul>
                    </li>

                </ul>
            </li>
            <li>
                <a href="#"><i class="icon-reminder"></i> <span>Resume</span></a>
                <ul>
                    <li><a href="#"><i class="icon-book"></i>Education</a>
                        <ul>
                            <li><a href="{{url('/education/view')}}">View</a></li>
                            <li><a href="{{url('/education/view')}}">Add</a></li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="icon-cup2"></i>Awards</a>
                        <ul>
                            <li><a href="{{url('/awards/view')}}">View</a></li>
                            <li><a href="{{url('/awards/add')}}">Add</a></li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="icon-cup2"></i>Experience</a>
                        <ul>
                            <li><a href="{{url('/dashboard/experience/')}}">View</a></li>


                            <li><a href="{{url('/dashboard/experience/add')}}">Add</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="icon-paragraph-center2"></i> <span>Post</span></a>
                <ul>
                    <li><a href="#">View</a></li>
                    <li><a href="{{url('/post/add')}}">Add New</a></li>
                </ul>
            </li>
            <li><a href="#"><i class="icon-search4"></i>Services</a>
                <ul>
                    <li><a href="{{url('/services/view')}}">View</a></li>
                    <li><a href="{{url('/services/add')}}">Add New</a></li>

                </ul>
            </li>
            <!-- /main -->

            <!-- Forms -->
            <li>
                <a href="#"><i class="icon-pencil3"></i> <span>Skills</span></a>
                <ul>
                    <li><a href="{{url('skills/view')}}">View</a></li>
                    <li><a href="{{url('skills/add')}}">Add New</a></li>

                </ul>
            </li>
            <li>
                <a href="#"> <i class="icon-accessibility"></i><span>Portfolios</span></a>
                <ul>
                    <li><a href="{{url('/portfolios/view')}}">View</a></li>
                    <li><a href="{{url('/portfolios/add')}}">Add New</a></li>

                </ul>
            </li>
            <li>
                <a href="#"><i class="icon-address-book3"></i> <span>Contact</span></a>
                <ul>
                    <li><a href="{{url('/contacts/view')}}">View</a></li>
                </ul>
            </li>
            <!-- /main nav bar -->
        </ul>
    </div>
</div>