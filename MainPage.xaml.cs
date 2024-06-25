using System;
using System.Collections.ObjectModel;
using Xamarin.Forms;

namespace TuApp
{
    public partial class MainPage : ContentPage
    {
        public ObservableCollection<string> Nacionalidades { get; set; }

        public MainPage()
        {
            InitializeComponent();
            Nacionalidades = new ObservableCollection<string>
            {
                "Perú", "Estados Unidos", "China", "Rusia", "Francia", "México"
            };
            BindingContext = this;
        }

        private void AgregarIdioma_Clicked(object sender, EventArgs e)
        {
            var entry = new Entry { Placeholder = "Escribe un nuevo idioma" };
            idiomasContainer.Children.Add(entry);
        }

        private void AgregarAptitud_Clicked(object sender, EventArgs e)
        {
            var entry = new Entry { Placeholder = "Escribe una nueva aptitud" };
            aptitudesContainer.Children.Add(entry);
        }

        private void AgregarLenguaje_Clicked(object sender, EventArgs e)
        {
            var entry = new Entry { Placeholder = "Escribe un nuevo lenguaje" };
            lenguajesContainer.Children.Add(entry);
        }

        private void AgregarExperiencia_Clicked(object sender, EventArgs e)
        {
            var stack = new StackLayout();
            stack.Children.Add(new Label { Text = "Puesto:" });
            stack.Children.Add(new Entry { Placeholder = "Puesto" });
            stack.Children.Add(new Label { Text = "Empresa:" });
            stack.Children.Add(new Entry { Placeholder = "Empresa" });
            stack.Children.Add(new Label { Text = "Período:" });
            stack.Children.Add(new Entry { Placeholder = "Período" });
            experienciaContainer.Children.Add(stack);
        }

        private void AgregarFormacion_Clicked(object sender, EventArgs e)
        {
            var stack = new StackLayout();
            stack.Children.Add(new Label { Text = "Grado:" });
            stack.Children.Add(new Entry { Placeholder = "Grado" });
            stack.Children.Add(new Label { Text = "Institución:" });
            stack.Children.Add(new Entry { Placeholder = "Institución" });
            stack.Children.Add(new Label { Text = "Período de formación:" });
            stack.Children.Add(new Entry { Placeholder = "Período de formación" });
            formacionContainer.Children.Add(stack);
        }

        private async void Enviar_Clicked(object sender, EventArgs e)
        {
            // Aquí puedes manejar el envío de datos, por ejemplo, a una API
            await DisplayAlert("Formulario", "Formulario enviado con éxito", "OK");
        }
    }
}
