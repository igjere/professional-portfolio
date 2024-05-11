/**
 * Main is a Java class containing a main method to run the program. Similar to implementation in Lab 4
 * 
 * @author Jeremiah Garcia (lnm248)
 * UTSA CS 3443 - Lab 5
 * Fall 2022
 */

package application;
	
import application.controller.LoginController;
import javafx.application.Application;
import javafx.fxml.FXMLLoader;
import javafx.stage.Stage;
import javafx.scene.Scene;
import javafx.scene.layout.AnchorPane;


public class Main extends Application {
	
	public static Stage stage;
	@Override
	public void start(Stage primaryStage) {
		try {
			
			stage = primaryStage;
			AnchorPane root = new AnchorPane();
			FXMLLoader loader = new FXMLLoader();
			loader.setLocation(Main.class.getResource("view/Login.fxml"));
			LoginController controller = new LoginController();
    		loader.setController(controller);
			root = (AnchorPane) loader.load();
			
			Scene scene = new Scene(root);
			primaryStage.setScene(scene);
			primaryStage.setTitle("Login View");
			primaryStage.show();
			
		} catch(Exception e) {
			e.printStackTrace();
		}
	}
	
	public static void main(String[] args) {
		launch(args);
	}
}
