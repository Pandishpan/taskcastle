<template>
    <div class="container">
        <div class="bubble">
            <h1>{{ outstandingLoans }}</h1>
            <h6>loans outstanding</h6>
        </div>
        <div class="bubble">
            <select v-model="selectedCurrency" class="current-currency">
                <option v-for="currency in currencies" :value="currency" :key="currency">
                    {{ currency }}
                </option>
            </select>
            <h6>base currency</h6>
        </div>
        <div class="bubble">
            <h1>{{ totalLoansValue }}</h1>
            <h6>loans amount taken</h6>
        </div>
        <div class="bubble">
            <h1>{{ outstandingLoansValue }}</h1>
            <h6>loans amount outstanding</h6>
        </div>
        <div class="bubble">
            <h1>{{ outstandingAverageApr }}</h1>
            <h6>average APR for loans outstanding</h6>
        </div>
        <div class="bubble">
            <h1>{{ paidOffIn }}</h1>
            <h6>Years until all loans are paid off</h6>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            //console.log('Loan Summary Component mounted.');
            //this.rows.filter
        },
        methods: {
            calculateValues() {
                // use cors-anywhere API to circumvent CORS POLICY, allows cross-origin request from localhost
                axios
                    .get('http://cors-anywhere.herokuapp.com/http://api.exchangeratesapi.io/latest?base=' + this.selectedCurrency)
                    .then(response => {

                            this.totalLoansValue = 0;
                            this.outstandingLoansValue = 0;

                            const rates = response.data.rates;

                            // CONVERT the value of each outstanding loan AND CALCULATE the total value
                            this.rows.filter(e => e[2] > 0).forEach((loan) => {
                                this.outstandingLoansValue += parseFloat(loan[2]) / rates[loan[3]];
                            });
                            this.outstandingLoansValue = this.outstandingLoansValue.toFixed(2);

                            // CONVERT the value of each loan AND CALCULATE the total value
                            this.rows.forEach((loan) => {
                                this.totalLoansValue += parseFloat(loan[1]) / rates[loan[3]];
                            });
                            this.totalLoansValue = this.totalLoansValue.toFixed(2);
                        }
                    )
            },
        },
        watch: {
            rows: function (value) {

                // number of outstanding loans
                this.outstandingLoans = this.rows.filter(e => e[2] > 0).length;

                // average APR for outstanding loans
                const aprArr = this.rows.filter(e => e[2] > 0).map(x => parseFloat(x[5]));
                this.outstandingAverageApr = (aprArr.reduce((sum, x) => sum + x) / aprArr.length).toFixed(2);

                // map all currencies from the CSV file
                this.currencies = this.rows.map(x => x[3]);

                //Calculate PAID OFF PERIOD for the outstanding loans
                this.rows.filter(e => e[2] > 0).forEach((loan) => {
                    const payPerMonth = loan[1] / (loan[6] * 12);
                    const outstandingYears = (loan[2] / payPerMonth / 12).toFixed(2);
                    if (this.paidOffIn < outstandingYears) {
                        this.paidOffIn = outstandingYears;
                    }
                });
                this.calculateValues();
            }
            ,
            selectedCurrency: function (value) {
                this.calculateValues();
            }
        }
        ,
        props: ['rows'],
        data:

            function () {
                return {
                    outstandingLoans: 0,
                    outstandingAverageApr: 0,
                    outstandingLoansValue: 0,
                    totalLoansValue: 0,
                    paidOffIn: 0,
                    currencies: [],
                    selectedCurrency: "GBP"
                };
            }
    }
</script>
