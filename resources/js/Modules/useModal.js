export default class useModal {
    constructor() {
        this.modal = document.querySelectorAll('.modal');
        this.modalValues = Array.from(this.modal);
        this.modalButton = document.querySelectorAll('.js-modal-button');
        this.buttonValues = Array.from(this.modalButton);
        this.modalCancel = document.querySelectorAll('.js-modal-cancel');
        this.cancelValues = Array.from(this.modalCancel);

        console.log(this.buttonValues);
        console.log(this.modal);
        console.log(this.modalValues);

        this.events();
    }

    events() {
        this.clickButton();
        this.cancelButton();
    }

    clickButton () {
        this.buttonValues.map((button, index) => {
            button.addEventListener('click', () => {
                console.log('this.modalValues[index]', this.modalValues[index]);
                this.modalValues[index].classList.toggle('hidden');
            });
        });
    }

    cancelButton () {
        this.cancelValues.map((button, index) => {
            button.addEventListener('click', () => {
                this.modalValues[index].classList.toggle('hidden');
            });
        });
    }

}