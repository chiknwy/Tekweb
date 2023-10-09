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

var scrollLinks = document.querySelectorAll('a[href^="#"]');
    for (var i = 0; i < scrollLinks.length; i++) {
    scrollLinks[i].addEventListener('click', function (e) {
        e.preventDefault();
        
        for (var j = 0; j < scrollLinks.length; j++) {
            scrollLinks[j].classList.remove('selected');
        }
        
        this.classList.add('selected');
        
        var targetId = this.getAttribute('href').substring(1);
        var targetElement = document.getElementById(targetId);
        if (targetElement) {
            window.scrollTo({
                top: targetElement.offsetTop - 100,
                behavior: 'smooth'
            });
        }
    });
}


    const menuToggle = document.getElementById("menu-toggle");
    const menu = document.getElementById("menu");

    menuToggle.addEventListener("click", function () {
        menu.classList.toggle("hidden");
        menuToggle.classList.toggle("rotate-90");

        if (menu.classList.contains("hidden")) {
            menuToggle.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            `;
        } else {
            menuToggle.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            `;
        }
    });