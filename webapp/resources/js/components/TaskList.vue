<template>
    <div>
        <h3>Task list:</h3>
        <ul class="list-group list-group-flush tasks mb-3">
            <li class="list-group-item">
                <h4>Run the app&nbsp;&#10003;</h4>

                <p class="requirements mb-0">Done!</p>
            </li>

            <li class="list-group-item">
                <!-- Task heading -->
                <h4>Show Instructions</h4>

                <!-- Task requirements -->
                <div class="requirements">
                    <p>The tasks in this Instructions panel don't have all their requirements shown yet. Modify the task list component to satisfy the requirements below.</p>
                    <p class="mb-0"><b>Requirements:</b></p>
                    <ol class="pl-3">
                        <li>When a task heading is clicked show/hide the requirements for that task.</li>
                        <li>All task requirements should be hidden by default.</li>
                    </ol>
                </div>
            </li>

            <li class="list-group-item">
                <h4>List Page</h4>

                <div class="requirements d-none">
                    <p class="mb-0"><b>Requirements:</b></p>
                    <ol class="pl-3">
                        <li>Replace "Playground" page heading with "Loan List"</li>
                        <li>Load data from the CSV file: <i>resources/sample.csv</i></li>
                        <li>Display the data from the CSV on the page in a user friendly format (e.g. date formatted as "1st January 2001")</li>
                    </ol>
                </div>
            </li>

            <li class="list-group-item">
                <h4>Loan List Summary</h4>

                <div class="requirements d-none">
                    <p class="mb-0"><b>Requirements:</b></p>
                    <ol class="pl-3">
                        <li>Create a Vue component to display loan list summary details</li>
                        <li>Display the component on the Loan List page</li>
                        <li>The summary should display the following:
                            <ul>
                                <li>total number of loans outstanding</li>
                                <li>base currency: dropdown with all the currencies from the CSV (default to GBP)</li>
                                <li>total loan amount taken in base currency</li>
                                <li>total loan amount outstanding in base currency</li>
                                <li>average APR for loans outstanding</li>
                                <li>time left until all loans are paid off</li>
                            </ul>
                            Use the <a href="https://exchangeratesapi.io/">API</a> to obtain exchange rates.
                        </li>
                    </ol>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Task list Component mounted.')
        }
    }
</script>
