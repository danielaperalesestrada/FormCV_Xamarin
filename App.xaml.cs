using Microsoft.Maui.Controls;

namespace YourAppNamespace
{
    public partial class App : Application
    {
        public App()
        {
            InitializeComponent();

            MainPage = new NavigationPage(new RegisterPage());
        }
    }
}
