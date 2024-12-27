export default () => ({
    showModal: false,
    form: {
        name: '',
        description: ''
    },
    errors: {},
    items: [],

    openModal() {
        this.showModal = true;
        this.errors = {};
        this.form = { name: '', description: '' };
    },

    closeModal() {
        this.showModal = false;
    },

    validateForm() {
        this.errors = {};

        if (!this.form.name) {
            this.errors.name = 'Name is required.';
        }

        return Object.keys(this.errors).length === 0; // Return true if no errors
    },

    async addItem() {
        if (!this.validateForm()) {
            return; // Prevent form submission if validation fails
        }

        try {
            const response = await fetch('/save', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify(this.form)
            });

            if (!response.ok) {
                const errorData = await response.json();
                if (errorData.errors) {
                    this.errors = errorData.errors;
                }
                throw new Error('Failed to add item');
            }
            this.fetchItems();
            // const data = await response.json();
            // this.items.push(data.item);
            this.closeModal();
        } catch (error) {
            console.error(error);
        }
    },
    // Fetch all products from the server
    async fetchItems() {
        try {
            const response = await fetch('/products'); // Assuming you have a route for fetching products
            if (!response.ok) {
                throw new Error('Failed to fetch items');
            }

            const data = await response.json();
            console.log(data);
            this.items = data; // Update the items array with the fetched products
        } catch (error) {
            console.error(error);
        }
    },

    // Call fetchItems when the component is initialized
    init() {
        this.fetchItems(); // Fetch items on component load
    }
});
