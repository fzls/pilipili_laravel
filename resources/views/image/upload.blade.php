@extends('layouts.layout')

@section('title','share your work with the world')

@section('head')
    <style>
        #global_nav {
            margin-bottom: 0;
        }

        #choose_category_nav .navbar-inverse .navbar-nav {
            display: inline-block;
            float: none;
            vertical-align: top;
        }

        #choose_category_nav .navbar-inverse .navbar-collapse {
            text-align: center;
        }

        body {
            background-color: #f4f2f4;
        }

        #illustration_form input, #illustration_form textarea {
            padding: 16px 20px;
        }

        .padding-right-20 {
            padding-right: 20px;
        }

        .padding-right-40 {
            padding-right: 40px;
        }

        .padding-20 {
            padding-left: 20px;
            padding-right: 20px;
        }

        .padding-30 {
            padding-left: 30px;
            padding-right: 30px;
        }

        .padding-40 {
            padding-left: 40px;
            padding-right: 40px;
        }

        .padding-60 {
            padding-left: 60px;
            padding-right: 60px;
        }

    </style>
@endsection

@section('body')
    <!--choose category-->
    <?php
    function add_nbsp($cnt, $content)
    {
        for ($i = 0; $i < $cnt; ++$i)
            echo '&nbsp';
        echo $content;
        for ($i = 0; $i < $cnt; ++$i)
            echo '&nbsp';
    }
    ?>
    <div id="choose_category_nav">
        <nav class="navbar-inverse" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#choose_nav">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="choose_nav">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="{{url('image/upload')}}"><?php add_nbsp(5, 'Illustrations'); ?></a>
                        </li>
                        <li><a href="{{url('image/upload?type=manga')}}"><?php add_nbsp(5, 'Manga'); ?></a></li>
                        <li><a href="{{url('image/ugoira_upload')}}"><?php add_nbsp(5, 'Ugoira'); ?></a></li>
                        <li><a href="{{url('novel/upload')}}"><?php add_nbsp(5, 'Novel'); ?></a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <form enctype="multipart/form-data" action="{{url('image/upload')}}" method="post" class="form-horizontal"
          id="illustration_form">
        {{csrf_field()}}
        <div id="select_file" class="text-center" style="background-color: #333;height: 202px;position: relative;">
            <div class="inline-block "><img class="vertical-center" src="{{url('img/hint-illust-1-en.png')}}"
                                            alt="hint-1"
                                            style="height: 135px;position: absolute;top: 25px;left: 225px;"></div>
            <div class="inline-block">
                <div><img src="{{url('img/hint-illust-2-en.png')}}" alt="hint-2"
                          style="height: 63px;margin-top: -10px;"></div>
                <label class="btn btn-primary btn-lg btn-file" style="margin: 10px 0;">
                    <?php add_nbsp(15, '<span class="glyphicon glyphicon-open-file"></span> <b>Select file</b>'); ?>
                    <input type="file" name="uploaded_images[]" style="display: none;" multiple
                           accept="image/jpeg, image/gif, image/png">
                </label>
                <div style="color: #ccc;font-size: 100%" class="container-fluid">
                    <ul class="_inline-list">
                        <li>JPEG</li>
                        <li>GIF</li>
                        <li>PNG</li>
                        <li>1 image limit: 8MB</li>
                        <li class="total-files">total limit: 30MB, up to 200 images.</li>
                        <!--                    fixme-->
                    </ul>
                </div>
            </div>
        </div>
        @if(Session::has('upload_info'))
            <div class="container text-center">
                <div class="alert-box success">
                    {!! Session::get('upload_info') !!}
                </div>
            </div>
        @endif

        <div class="container text-center">
            <input type="hidden" name="mode" value="upload">
            <input type="hidden" name="type" value="illustration">
            <input type="hidden" name="user_id" value="1"><!-- fixme -->
            <div class="form-group">
                <input type="text" class="form-control" id="title" name="title" placeholder="Title">
            <textarea rows="5" class="form-control" id="description"
                      name="description" placeholder="Description"></textarea>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="tags" name="tags"
                       placeholder="Enter your tags, and separate it with space or tab">
                <div class="text-left well-sm form-content">
                    <div class="inline-block" style="color: #b8e986;">
                        Recommended<br>
                        Tags
                    </div>
                    <div class="inline-block" id="recommended_tags">

                    </div>
                </div>
                <div class="text-left form-content">
                    <input type="checkbox">Lock tags only to author
                </div>
            </div>
            <div class="form-group text-left form-content">
                <div class="inline-block">Browsing restriction <?php add_nbsp(2, ''); ?></div>
                <label class="radio-inline">
                    <input type="radio" name="browsing_restriction" id="browsing_restriction_all_ages" value="All ages">
                    all_ages
                </label>
                <label class="radio-inline">
                    <input type="radio" name="browsing_restriction" id="browsing_restriction_R_18" value="R-18"> R-18
                </label>
                <label class="radio-inline">
                    <input type="radio" name="browsing_restriction" id="browsing_restriction_R_18G" value="R-18G"> R-18G
                </label>
            </div>
            <div class="form-group form-content text-left">
                <div class="inline-block">Privacy<?php add_nbsp(2, ''); ?></div>
                <label class="radio-inline">
                    <input type="radio" name="privacy" id="privacy_public" value="public"> Make public
                </label>
                <label class="radio-inline">
                    <input type="radio" name="privacy" id="privacy_uploader_only" value="uploader only"> My pixiv only
                </label>
                <label class="radio-inline">
                    <input type="radio" name="privacy" id="privacy_private" value="private"> Private
                </label>
            </div>
            <h3 class="text-left">Content</h3>
            <div class="form-group text-left">
                <div class="form-content"><input type="checkbox" name="original" value="Original"> Original work
                </div>
                <div class="form-content">
                    <div class="inline-block">Sexual/Suggestive content?<?php add_nbsp(2, ''); ?></div>
                    <label class="radio-inline">
                        <input type="radio" name="sexual_content" id="sexual_content_none" value="none"> None
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="sexual_content" id="sexual_content_yes" value="yes"> Yes (Includes
                        light
                        sexual or suggestive)
                    </label>
                </div>
                <div class="form-content">
                    <div class="inline-block" style="vertical-align: top">Contains <?php add_nbsp(5, ''); ?> </div>
                    <div class="inline-block">
                        <ul>
                            <li class="checkbox">
                                <label><input type="checkbox" name="contains[]" id="contain_violence" value="violence">Violence</label>
                            </li>
                            <li class="checkbox">
                                <label><input type="checkbox" name="contains[]" id="contain_drugs"
                                              value="drugs, smoking, alcoholism">
                                    Drugs, smoking, alcoholism</label>
                            </li>
                            <li class="checkbox">
                                <label><input type="checkbox" name="contains[]" id="contain_sensitive"
                                              value="Strong language/Sensitive themes">Strong language/Sensitive
                                    themes</label>
                            </li>
                            <li class="checkbox">
                                <label><input type="checkbox" name="contains[]" id="contain_criminal"
                                              value="Criminal acts">Criminal
                                    acts</label>
                            </li>
                            <li class="checkbox">
                                <label><input type="checkbox" name="contains[]" id="contain_religious"
                                              value="Religious imagery">Religious imagery</label>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="form-content">
                    <div class="inline-block" style="vertical-align: top">Mature
                        content <?php add_nbsp(5, ''); ?> </div>
                    <div class="inline-block">
                        <ul>
                            <li class="checkbox">
                                <label><input type="checkbox" name="mature_content[]" id="minors"
                                              value="minors">Minors</label>
                            </li>
                            <li class="checkbox">
                                <label><input type="checkbox" name="mature_content[]" id="furry"
                                              value="furry">Furry</label>
                            </li>
                            <li class="checkbox">
                                <label><input type="checkbox" name="mature_content[]" id="bl" value="bl">BL</label>
                            </li>
                            <li class="checkbox">
                                <label><input type="checkbox" name="mature_content[]" id="gl" value="gl">GL</label>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="text-center form-content">
                    Please only upload work that you've made or have permission to post. Work that violate our <a
                            href="#">Terms of Use</a> and <a href="#">Guidelines</a> will be deleted.
                </div>
            </div>
            <h3 class="text-left">Tools used</h3>
            <div class="form-group text-left">
                <div class="row">
                    <div class="col-xs-4">
                        <input class="btn-group-justified" type="text" name="tool_1" id="tool_1"
                               placeholder="Tools used 1">
                    </div>
                    <div class="col-xs-4">
                        <input class="btn-group-justified" type="text" name="tool_2" id="tool_2"
                               placeholder="Tools used 2">
                    </div>
                    <div class="col-xs-4">
                        <input class="btn-group-justified" type="text" name="tool_3" id="tool_2"
                               placeholder="Tools used 3">
                    </div>
                </div>
            </div>

            <h3 class="text-left">Poll</h3>
            <div class="form-group text-left">
                <input type="text" class="form-control" name="poll_question" id="poll_question"
                       placeholder="Question: (eg: WTF this ASP.NET MVC is ?)">
            </div>

            <h3 class="text-left">Image response</h3>
            <div class="form-group text-left">
                <input type="text" class="form-control" name="image_response" id="image_response"
                       placeholder="Image Response Work ID / URL">
                <label class="checkbox form-content">
                    <input type="checkbox" name="allow_response" id="allow_response" value="allow response">
                    Automatically
                    allow responses to my work
                </label>
            </div>

            <h3 class="text-left">Reserve submissions</h3>
            <div class="form-group text-left">
                <label class="checkbox form-content">
                    <input type="checkbox" name="submit_later" id="submit_later" value="submit later">
                    Schedule the date and time of uploading
                </label>
                <div class="row">
                    <div class="col-md-6">
                        <input type="date" class="form-control" name="reserve_submit_time" id="reserve_submit_time">
                    </div>
                    <div class="col-md-6">
                        <input type="time" class="form-control" name="reserve_submit_time" id="reserve_submit_time">
                    </div>
                </div>
            </div>

            <button accesskey="c" class="btn btn-primary" role="button" type="submit">
                <?php add_nbsp(5, 'Submit'); ?>
            </button>
        </div>
    </form>
    <div class="container text-center">
        <div>&nbsp;</div>
        <div>&nbsp;</div>
        <div>&nbsp;</div>
        <div>&nbsp;</div>
        <div>&nbsp;</div>
    </div>
@endsection