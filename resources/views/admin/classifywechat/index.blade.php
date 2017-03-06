@extends('layouts.admin')
@section('content')
<!-- Main content -->
<section class="content">
  <!-- row -->
  <div class="row">
    <div class="col-xs-12">
      <div class="box" id="app-content">
        <div class="box-header">
          <h3 class="box-title">
            @include('admin.include.button-add')
            @include('admin.include.button-menu')
            <button @click="back_action()" type="button" class="btn btn-default pull-left " style="margin:0 0 0 10px;">
             {{trans('admin.website_action_goback')}} 【{{trans('admin.define_model_wechat_mp')}}： {{$website['info']['name']}}】
            </button>
          </h3>
          @include('admin.include.search')
        </div>
        <!-- /.box-header -->
        <div class="box-body" >
          <table class="table table-bordered">
            <thead>
            <tr>
              <th>{{trans('admin.fieldname_item_id')}}</th>
              <th>{{trans('admin.fieldname_item_name')}}</th>
              <th>{{trans('admin.fieldname_item_keyword')}}</th>
              <th>{{trans('admin.fieldname_item_ico')}}</th>
              <th>{{trans('admin.fieldname_item_linkurl')}}</th>
              <th>{{trans('admin.fieldname_item_orderid')}}</th>
              <th>{{trans('admin.fieldname_item_status')}}</th>
              <th>{{trans('admin.fieldname_item_option')}}</th>
            </tr>
            </thead>
            <tbody>
              @include('admin.include.fieldvalue.v-for')
                <td>@{{ item.id }}</td>
                <td>@{{ item.gtstr }} @{{ item.name }}</td>
                <td>@{{ item.keyword}}</td>)
                <td>@{{ item.ico}}</td>)
                <td>@{{ item.linkurl}}</td>)
                <td>@{{ item.orderid}}</td>)
                @include('admin.include.fieldvalue.status')
                <td>
                  <div class="tools">
                    @include('admin.include.fieldvalue.option')
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
        @include('admin.include.pages')
        <!-- /.page -->
      </div>
      <!-- /.box -->
    </div>
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->

<script type="text/javascript">
new Vue({
    @include('admin.include.vue-el')
    data: {
             apiurl_list          :'{{ route("post.admin.classifywechat.api_list") }}',
             apiurl_menu          :'{{ route("post.wechat.api.create_menu") }}/{{$website["wechat_id"]}}',
             linkurl_add          :'{{ route("get.admin.classifywechat.add") }}/{{$website["wechat_id"]}}', 
             linkurl_edit         :'{{ route("get.admin.classifywechat.edit") }}/', 
             linkurl_back         :'{{ route("get.admin.wechat.manage") }}/{{$website["wechat_id"]}}',
             @include('admin.include.vue-apiurl-action-one')
             @include('admin.include.vue-apiurl-action-delete')
             @include('admin.include.vue-pages-dataitems')
             @include('admin.include.vue-pages-pageparams')
             @include('admin.include.vue-pages-paramsdata')
             menudata:
             {
                    id             :'{{$website["wechat_id"]}}',
             },
          },
    @include('admin.include.vue-ready')      
    @include('admin.include.vue-pages-computed')  
    methods: {
            @include('admin.include.vue-methods-action_list_get')
            @include('admin.include.vue-methods-action_list_do')
            @include('admin.include.vue-methods-action_list_search')
            @include('admin.include.vue-methods-action_one_get')
            @include('admin.include.vue-methods-action_info_return')
            @include('admin.include.vue-methods-action_menu_create')
            @include('admin.include.vue-methods-link_click_add')
            @include('admin.include.vue-methods-link_click_edit')
            @include('admin.include.vue-methods-link_click_page')
            @include('admin.include.vue-methods-link_click_delete')
            @include('admin.include.vue-methods-link_click_back')
        }            
})

</script>
@endsection