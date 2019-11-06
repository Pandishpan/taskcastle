@extends('layouts.app')

@section('content')

    <h1 class="text-center">Loan List</h1>
    <div class="csv-table">
        <table class="table is-narrow">
            <thead>
            <tr>
                <th class="number-cell" v-for="header in headers">
                    <div class="csv-header">
                        <span>@{{header}}</span>
                        </span>
                    </div>
                </th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="row in rows">
                <td class="number-cell" v-for="(cell, index) in row">
                    <template v-if="index">@{{cell}}</template>
                    <template v-else>@{{cell | moment("Do MMMM YYYY")}}</template>
                </td>
            </tr>
            </tbody>
        </table>
    </div>

    <loan-summary :rows="rows"></loan-summary>

@endsection
