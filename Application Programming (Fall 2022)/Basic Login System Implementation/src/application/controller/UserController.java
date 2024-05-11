/**
 * UserController is a Java class containing method to run FXML file "UserView".
 * 
 * @author Jeremiah Garcia (lnm248)
 * UTSA CS 3443 - Lab 5
 * Fall 2022
 */

package application.controller;

import java.io.IOException;
import application.Main;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.layout.AnchorPane;
import application.model.User;
import javafx.scene.paint.Color;
import javafx.scene.paint.Paint;
import javafx.scene.shape.Rectangle;


public class UserController {

    @FXML
    private Button familyContactButton;

    @FXML
    private Label fullnameLabel;

    @FXML
    private Button logoutButton;
    
    @FXML
    private Rectangle userBackground;

    @FXML
    private Label usernameLabel;

    @FXML
    private Button workContactButton;
    
    
	/* Initializes scene */
	public void initialize() throws IOException {}
	public void initData(User user) throws IOException {
//		System.out.println(user.getUsername());
		String favColor1 = user.getFavoriteColor1().toUpperCase().replaceAll("\\s", "");
//		System.out.println(favColor1);
		userBackground.setStyle("-fx-fill: " + favColor1 +";");
		String favColor2 = user.getFavoriteColor2().toUpperCase().replaceAll("\\s", "");
//		System.out.println(favColor2);
		fullnameLabel.setStyle("-fx-text-fill: " + favColor2 +";");
		String fullname = user.getFullName();
		String username = user.getUsername();
		fullnameLabel.setText(fullname);
		usernameLabel.setText(username);	
	}

	//Sends to family contact table view (that follows extra credit format)
    @FXML
    void familyContactPressed(ActionEvent event) {
		try {
			FXMLLoader loader = new FXMLLoader(); 
    		loader.setLocation(Main.class.getResource("view/FamilyContactView.fxml"));
    		FamilyContactController controller = new FamilyContactController();
    		loader.setController(controller);
    		AnchorPane layout = (AnchorPane) loader.load();
    		Scene scene = new Scene(layout);
    		Main.stage.setScene(scene);
    		Main.stage.setTitle("Family Contact View");
    		String username = usernameLabel.getText();
    		User user = User.loadUser(username);
    		controller.initData(user);
    		Main.stage.show();
		}
		catch(Exception e) {
			e.printStackTrace();
		}
    }

  //Sends back to login
    @FXML
    void logoutPressed(ActionEvent event) {
		try {
			FXMLLoader loader = new FXMLLoader(); 
    		loader.setLocation(Main.class.getResource("view/Login.fxml"));
    		LoginController controller = new LoginController();
    		loader.setController(controller);
    		AnchorPane layout = (AnchorPane) loader.load();
    		Scene scene = new Scene(layout);
    		Main.stage.setScene(scene);
    		Main.stage.setTitle("Login View");
    		Main.stage.show();
		}
		catch(Exception e) {
			e.printStackTrace();
		}
    }

    //Sends to work contact table view (that follows extra credit format)
    @FXML
    void workContactPressed(ActionEvent event) {
		try {
			FXMLLoader loader = new FXMLLoader(); 
    		loader.setLocation(Main.class.getResource("view/WorkContactView.fxml"));
    		WorkContactController controller = new WorkContactController();
    		loader.setController(controller);
    		AnchorPane layout = (AnchorPane) loader.load();
    		Scene scene = new Scene(layout);
    		Main.stage.setScene(scene);
    		Main.stage.setTitle("Work Contact View");
    		String username = usernameLabel.getText();
    		User user = User.loadUser(username);
    		controller.initData(user);
    		Main.stage.show();
		}
		catch(Exception e) {
			e.printStackTrace();
		}
    }
}
