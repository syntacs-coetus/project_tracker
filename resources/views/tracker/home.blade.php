@extends('tracker.layouts.app')

@section('content')

<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Projects</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
                    <i class="fas fa-minus"></i></button>
            </div>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped projects">
                <thead>
                    <tr>
                        <th style="width: 1%">
                            #
                        </th>
                        <th style="width: 20%">
                            Project Name
                        </th>
                        <th style="width: 30%">
                            Team Members
                        </th>
                        <th>
                            Project Progress
                        </th>
                        <th style="width: 8%" class="text-center">
                            Status
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            #
                        </td>
                        <td>
                            <a href="{{route('project')}}">
                                AdminLTE v3
                            </a>
                            <br />
                            <small>
                                Created 01.01.2019
                            </small>
                        </td>
                        <td>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <img alt="Avatar" class="table-avatar" src="{{asset('assets/dist/img/avatar.png')}}">
                                </li>
                                <li class="list-inline-item">
                                    <img alt="Avatar" class="table-avatar" src="{{asset('assets/dist/img/avatar2.png')}}">
                                </li>
                                <li class="list-inline-item">
                                    <img alt="Avatar" class="table-avatar" src="{{asset('assets/dist/img/avatar3.png')}}">
                                </li>
                                <li class="list-inline-item">
                                    <img alt="Avatar" class="table-avatar" src="{{asset('assets/dist/img/avatar04.png')}}">
                                </li>
                            </ul>
                        </td>
                        <td class="project_progress">
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-green" role="progressbar" aria-volumenow="100"
                                    aria-volumemin="0" aria-volumemax="100" style="width: 100%">
                                </div>
                            </div>
                            <small>
                                100% Complete
                            </small>
                        </td>
                        <td class="project-state">
                            <span class="badge badge-success">Clean</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <div class="card collapsed-card">
        <div class="card-header">
            <h3 class="card-title">Members</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
                    <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip"
                    title="Remove">
                    <i class="fas fa-times"></i></button>
            </div>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped projects">
                <thead>
                    <tr>
                        <th style="width: 1%">
                            Avatar
                        </th>
                        <th style="width: 20%">
                            Member Name
                        </th>
                        <th style="width: 10%">
                            Position
                        </th>
                        <th class="text-center" style="width: 40">
                            Projects
                        </th>
                        <th style="width: 15%" class="text-center">
                            Completion Rate
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <img alt="Avatar" class="table-avatar" src="{{asset('assets/dist/img/avatar.png')}}">
                        </td>
                        <td>
                            <a>
                                AtraXaz
                            </a>
                            <br />
                            <small>
                                Joined 01.01.2019
                            </small>
                        </td>
                        <td>
                            Owner
                        </td>
                        <td class='text-center'>
                            <span class="badge badge-primary">project_tracker</span>
                            <span class="badge badge-primary">PaMana</span>
                            <span class="badge badge-primary">sa_rp</span>
                        </td>
                        <td class="project_progress">
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-green" role="progressbar" aria-volumenow="57"
                                    aria-volumemin="0" aria-volumemax="100" style="width: 57%">
                                </div>
                            </div>
                            <small>
                                57% Complete
                            </small>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</section>
@endsection
