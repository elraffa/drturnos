export default class AlertMessages {
    constructor() {
        this.successMessage = document.querySelector('.js-success-message');

        this.events();
    }


    events() {
        this.successMessageFade();
    }

    successMessageFade() {
        if (this.successMessage) {
            setTimeout(() => {
                this.successMessage.classList.add('hidden');
            }, 3000);
        }
    }
}