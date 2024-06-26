using System;
using System.Data;
using System.Windows;
using System.Windows.Controls;

namespace rekenmachine
{
    public partial class MainWindow : Window
    {
        private string currentInput = ""; 

        public MainWindow()
        {
            InitializeComponent();
        }

        private void Button_Click(object sender, RoutedEventArgs e)
        {
            string input = (sender as Button).Content.ToString();
            currentInput += input;
            UpdateResultText(currentInput);
        }

        private void OperationButton_Click(object sender, RoutedEventArgs e)
        {
            string operation = (sender as Button).Content.ToString();
            currentInput += $" {operation} ";
            UpdateResultText(currentInput);
        }

        private void ClearButton_Click(object sender, RoutedEventArgs e)
        {
            currentInput = "";
            UpdateResultText("");
        }

        private void btnBack_Click(object sender, RoutedEventArgs e)
        {
            if (currentInput.Length > 0)
            {
                currentInput = currentInput.Substring(0, currentInput.Length - 1);
                UpdateResultText(currentInput);
            }
        }
        private void EqualsButton_Click(object sender, RoutedEventArgs e)
        {
            try
            {
                DataTable dt = new DataTable();
                var result = dt.Compute(currentInput, null);
                UpdateResultText(result.ToString());
                currentInput = result.ToString();
            }
            catch (Exception ex)
            {
                MessageBox.Show("Fout bij berekening: " + ex.Message);
            }
        }

        private void UpdateResultText(string text)
        {
            ResultTextBox.Text = text;
        }
    }
}
