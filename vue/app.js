new Vue({
    el: '#app',
    data: {
        loanAmount: null,
        interestRate: null,
        loanTerm: null,
        monthlyPayment: null,
        calculationHistory: [],
        selectedCurrency: 'usd'
    },
    methods: {
        calculateMonthlyPayment: function() {
            if (this.loanAmount !== null && this.interestRate !== null && this.loanTerm !== null) {
                const monthlyInterestRate = this.interestRate / 100 / 12;
                const monthlyPayment = (this.loanAmount * monthlyInterestRate * Math.pow(1 + monthlyInterestRate, this.loanTerm)) /
                    (Math.pow(1 + monthlyInterestRate, this.loanTerm) - 1);
                this.monthlyPayment = monthlyPayment;

                this.calculationHistory.push({
                    loanAmount: this.loanAmount,
                    interestRate: this.interestRate,
                    loanTerm: this.loanTerm,
                    monthlyPayment: monthlyPayment,
                    currency: this.selectedCurrency 
                });
            } else {
                alert("Please fill in all the fields.");
            }
        },

        deleteHistoryEntry: function(index) {
            this.calculationHistory.splice(index, 1);
        },

        clearHistory: function() {
            this.calculationHistory = [];
        },

        toggleCurrency: function() {
            this.selectedCurrency = this.selectedCurrency === 'USD' ? 'IDR' : 'USD';
        },

        formatCurrency: function(amount, currency) {
            const currencySymbol = currency === 'USD' ? '$' : 'Rp';
            return `${currencySymbol}${amount.toFixed(2)}`;
        }
    }
});