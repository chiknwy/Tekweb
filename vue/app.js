new Vue({
    el: '#app', 
    data: {
        loanAmount: null,   
        interestRate: null, 
        loanTerm: null,     
        monthlyPayment: null, 
        calculationHistory: [] 
    },
    methods: {
        calculateMonthlyPayment: function() {
            if (this.loanAmount !== null && this.interestRate !== null && this.loanTerm !== null) {
                const monthlyInterestRate = this.interestRate / 100 / 12;
                const monthlyPayment = (this.loanAmount * monthlyInterestRate) /
                    (1 - Math.pow(1 + monthlyInterestRate, -this.loanTerm));
                this.monthlyPayment = monthlyPayment;
                
                this.calculationHistory.push({
                    loanAmount: this.loanAmount,
                    interestRate: this.interestRate,
                    loanTerm: this.loanTerm,
                    monthlyPayment: monthlyPayment
                });
            } 
            else {
                alert("Please fill in all the fields.");
            }
        },

        deleteHistoryEntry: function(index) {
            this.calculationHistory.splice(index, 1);
        },

        clearHistory: function() {
            this.calculationHistory = [];
        }
    }
});
