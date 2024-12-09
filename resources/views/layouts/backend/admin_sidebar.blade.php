 <li>
  <a href="{{route('menu.index')}}">
    <div class="parent-icon">
      <i class="bi bi-menu-button-wide-fill"></i>
    </div>
    <div class="menu-title">Manage Menu</div>
  </a>
</li>



<li>
  <a href="javascript:;" class="has-arrow">
    <div class="parent-icon"><i class="bi bi-code"></i>
    </div>
    <div class="menu-title">Manage Website</div>
  </a>
  <ul>

   <li> 
    <a href="{{route('banner.index')}}">
      <i class="bi bi-arrow-right-short"></i>
      Banner
    </a>
  </li>

  <li>
   <a href="{{route('review.index')}}">
    <i class="bi bi-arrow-right-short"></i>
    Review
  </a>
</li>

<li>
 <a href="{{route('faqs.index')}}">
  <i class="bi bi-arrow-right-short"></i>
  FAQ's
</a>
</li>

<li>
  <a href="{{route('gallery.index')}}">
   <i class="bi bi-arrow-right-short"></i>
   Portfolio
 </a>
</li>


</ul>
</li>


<li>
  <a href="{{route('package.index')}}">
    <div class="parent-icon"><i class="bi bi-tags"></i>
    </div>
    <div class="menu-title">Manage Plans</div>
  </a>
</li>



<li>
  <a href="{{route('service.index')}}">
    <div class="parent-icon"><i class="bi bi-hdd-rack-fill"></i>
    </div>
    <div class="menu-title">Manage Service</div>
  </a>
</li>

<li>
  <a href="{{route('page.index')}}">
    <div class="parent-icon"><i class="bi bi-journals"></i>
    </div>
    <div class="menu-title">Manage Pages</div>
  </a>
</li>



<li>
  <a href="{{route('business.list')}}">
    <div class="parent-icon">
      <i class="bi bi-building"></i>
    </div>
    <div class="menu-title">Manage Business</div>
  </a>
</li>


<li>
  <a href="{{route('subscribers.index')}}">
    <div class="parent-icon"><i class="bi bi-envelope"></i>
    </div>
    <div class="menu-title">User Subscribers</div>
  </a>
</li>


<li>
  <a href="javascript:;" class="has-arrow">
    <div class="parent-icon"><i class="bi bi-person"></i>
    </div>
    <div class="menu-title">System Users</div>
  </a>
  <ul>

    <li> 
      <a href="{{route('user.index')}}">
        <i class="bi bi-arrow-right-short"></i>
        User List
      </a>
    </li>

    <li>
     <a href="{{route('permission.index')}}">
      <i class="bi bi-arrow-right-short"></i>
      Permission
    </a>
  </li>

</ul>
</li>

<li>
  <a href="javascript:;" class="has-arrow">
    <div class="parent-icon"><i class="bi bi-question-circle"></i>
    </div>
    <div class="menu-title">Manage Appearance</div>
  </a>
  <ul>
    <li><a href="{{ route('custom.style.settings') }}"><i class="bi bi-arrow-right-short"></i>Custom CSS</a></li>
    <li> <a href="{{route('custom.js.settings')}}"><i class="bi bi-arrow-right-short"></i>Custom JS</a></li>
    <li> <a href="{{route('custom.html.settings')}}"><i class="bi bi-arrow-right-short"></i>Custom HTML</a></li>
  </ul>
</li>

<li>
  <a href="javascript:;" class="has-arrow">
    <div class="parent-icon"><i class="bi bi-gear"></i>
    </div>
    <div class="menu-title">Manage Setting</div>
  </a>
  <ul>
   
    <li> <a href="{{route('information.setting')}}"><i class="bi bi-arrow-right-short"></i>Other Information</a>
    </li>

    <li> <a href="{{route('general.settings')}}"><i class="bi bi-arrow-right-short"></i>General Setting</a>
    </li>
    <li> <a href="{{route('media.settings')}}"><i class="bi bi-arrow-right-short"></i>Media Setting</a>
    </li>
    <li> <a href="{{route('extra.settings')}}"><i class="bi bi-arrow-right-short"></i>Title Setting</a>
    </li>
    <li> <a href="{{route('google.settings')}}"><i class="bi bi-arrow-right-short"></i>Google Setting</a>
    </li>

    <li> <a href="{{route('seo.settings')}}"><i class="bi bi-arrow-right-short"></i>SEO Setting</a>
    </li>

    <li> <a href="{{route('smtp.settings')}}"><i class="bi bi-arrow-right-short"></i>SMTP Setting</a>
    </li>

    <li> <a href="{{route('payment.settings')}}"><i class="bi bi-arrow-right-short"></i>Payment Gateway</a>
    </li>

  </ul>
</li>