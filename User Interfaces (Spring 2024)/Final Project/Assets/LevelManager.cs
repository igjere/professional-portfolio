using System.Collections;
using System.Collections.Generic;
using TMPro;
using UnityEngine;
using UnityEngine.UI;
using UnityEngine.SceneManagement;

public class LevelManager : MonoBehaviour {
    public GameObject antPrefab;  // Reference to the ant prefab
    public GameObject beetlePrefab;
    public GameObject centipedePrefab;
    public GameObject groachPrefab;
    public GameObject roachPrefab;
    public GameObject flyPrefab;
    public GameObject locustPrefab;
    public GameObject mosuitoPrefab;
    public GameObject mothPrefab;
    public GameObject scorpionPrefab;
    public GameObject spiderPrefab;
    public GameObject termitePrefab;
    public GameObject tickPrefab;
    public GameObject waspPrefab;
    public GameObject wormPrefab;

    public Transform spawnArea;   // The area where ants will spawn
    public Text levelText;        // UI Text to display current level
    public Text timeText;         // UI Text to display remaining time
    public Text pointText;        // UI Text to display points
    public Text quotaText;        // UI Text to display quota
    public float levelTime = 60f; // Starting time for each level

    public GameObject resultPanel; // Reference to the result panel
    public Text resultLevelText, resultPointsText, outcomeText, levelDescription; // Text elements to display results
    public Button nextLevelButton, mainMenuButton, settingsButton; // Buttons for user interaction

    public int level = 1;
    public int quota = 10;            // Starting number of points to reach
    public float timeRemaining;
    public int points = 0;            // Starting points
    public int totalPoints = 0;

    public AudioSource SoundPlayer;

    void Start()
    {
        StartLevel();
        resultPanel.SetActive(false);
    }

    void Update() {
        if (timeRemaining > 0)
        {
            timeRemaining -= Time.deltaTime;
            UpdateTimeText();
        }
        else
        {
            ShowResults(false);
            //FailLevel();
        }

        if (Input.GetKeyDown("r")) {  // Reload scene, for testing purposes
            SceneManager.LoadScene(SceneManager.GetActiveScene().name);
        }
        if (Input.GetKeyDown(KeyCode.Escape)) {
            SceneManager.LoadScene("Title Screen");
        }
    }

    void StartLevel() {
        timeRemaining = 60f;
        UpdateLevelText();
        UpdatePointText();
        UpdateTimeText();
        UpdateQuotaText();
        CalculateSpawnAreaBounds();
        SpawnCreatures(quota + 10);
    }

    void CalculateSpawnAreaBounds() {
        if (Camera.main.orthographic) {
            var vertExtent = Camera.main.orthographicSize;  
            var horzExtent = vertExtent * Screen.width / Screen.height;
            var bottomLeft = Camera.main.ViewportToWorldPoint(new Vector3(0, 0, Camera.main.nearClipPlane));
            var topRight = Camera.main.ViewportToWorldPoint(new Vector3(1, 1, Camera.main.nearClipPlane));
            spawnArea.localScale = new Vector3(horzExtent * 2, vertExtent * 2, spawnArea.localScale.z);
            spawnArea.position = Camera.main.transform.position + new Vector3(0, 0, 10);  // Adjust Z to be within the visible range
        }
    }

    void SpawnCreatures(int number) {
        float minX = spawnArea.position.x - spawnArea.localScale.x / 2;
        float maxX = spawnArea.position.x + spawnArea.localScale.x / 2;
        float minY = spawnArea.position.y - spawnArea.localScale.y / 2;
        float maxY = spawnArea.position.y + spawnArea.localScale.y / 2;

        GameObject[] creaturePrefabs = GetCreaturePrefabsForLevel();
        for (int i = 0; i < number; i++) {
            Vector3 spawnPosition = new Vector3(Random.Range(minX, maxX), Random.Range(minY, maxY), spawnArea.position.z);
            GameObject creature = Instantiate(creaturePrefabs[Random.Range(0, creaturePrefabs.Length)], spawnPosition, Quaternion.identity);
            AssignLevelManager(creature);
        }
    }

    void AssignLevelManager(GameObject creature) {
        // Determine type and assign the LevelManager reference accordingly
        if (creature.GetComponent<antMove>() != null) {
            creature.GetComponent<antMove>().levelMan = this;
        } else if (creature.GetComponent<beetleMove>() != null) {
            creature.GetComponent<beetleMove>().levelMan = this;
        } else if (creature.GetComponent<centipedeMove>() != null) {
            creature.GetComponent<centipedeMove>().levelMan = this;
        } else if (creature.GetComponent<flyMove>() != null) {
            creature.GetComponent<flyMove>().levelMan = this;
        } else if (creature.GetComponent<groachMove>() != null) {
            creature.GetComponent<groachMove>().levelMan = this;
        } else if (creature.GetComponent<locustMove>() != null) {
            creature.GetComponent<locustMove>().levelMan = this;
        } else if (creature.GetComponent<mosquitoMove>() != null) {
            creature.GetComponent<mosquitoMove>().levelMan = this;
        } else if (creature.GetComponent<mothMove>() != null) {
            creature.GetComponent<mothMove>().levelMan = this;
        } else if (creature.GetComponent<roachMove>() != null) {
            creature.GetComponent<roachMove>().levelMan = this;
        } else if (creature.GetComponent<scorpionMove>() != null) {
            creature.GetComponent<scorpionMove>().levelMan = this;
        } else if (creature.GetComponent<spiderMove>() != null) {
            creature.GetComponent<spiderMove>().levelMan = this;
        } else if (creature.GetComponent<termiteMove>() != null) {
            creature.GetComponent<termiteMove>().levelMan = this;
        } else if (creature.GetComponent<tickMove>() != null) {
            creature.GetComponent<tickMove>().levelMan = this;
        } else if (creature.GetComponent<waspMove>() != null) {
            creature.GetComponent<waspMove>().levelMan = this;
        } else if (creature.GetComponent<wormMove>() != null) {
            creature.GetComponent<wormMove>().levelMan = this;
        }
    }

    GameObject[] GetCreaturePrefabsForLevel() {
        switch (level) {
            case 1:
                return new GameObject[] { antPrefab };
            case 2:
                return new GameObject[] { antPrefab, flyPrefab };
            case 3:
                return new GameObject[] { flyPrefab, locustPrefab };
            case 4:
                return new GameObject[] { locustPrefab, roachPrefab };
            case 5:
                return new GameObject[] {roachPrefab, mothPrefab };
            case 6:
                return new GameObject[] { mothPrefab, centipedePrefab };
            default:
                return new GameObject[] { groachPrefab }; // Default to only spawning ants
        }
    }

    public void AntClicked()
    {
        points++;
        UpdatePointText();
        if (points >= quota)
        {
            //NextLevel();
            ShowResults(true);
        }
    }

    public void BeetleClicked()
    {
        points += 2;
        UpdatePointText();
        if (points >= quota)
        {
            //NextLevel();
            ShowResults(true);
        }
    }

    public void FlyClicked()
    {
        points += 3;
        UpdatePointText();
        if (points >= quota)
        {
            //NextLevel();
            ShowResults(true);
        }
    }

    public void RoachClicked()
    {
        points += 4;
        UpdatePointText();
        if (points >= quota)
        {
            //NextLevel();
            ShowResults(true);
        }
    }

    public void TermiteClicked()
    {
        points += 5;
        UpdatePointText();
        if (points >= quota)
        {
            //NextLevel();
            ShowResults(true);
        }
    }

    public void TickClicked()
    {
        points += 6;
        UpdatePointText();
        if (points >= quota)
        {
            //NextLevel();
            ShowResults(true);
        }
    }

    public void ScorpionClicked()
    {
        points += 7;
        UpdatePointText();
        if (points >= quota)
        {
            //NextLevel();
            ShowResults(true);
        }
    }

    public void GroachClicked()
    {
        points += 10;
        UpdatePointText();
        if (points >= quota)
        {
            //NextLevel();
            ShowResults(true);
        }
    }

    void ShowResults(bool isSuccess) {
        if (resultPanel.activeSelf)
            return;
        totalPoints += points;
        resultPanel.SetActive(true); // Show the result panel
        if (MainScript.ScreenReaderEnabled == true)
            SoundPlayer.Play();

        resultPointsText.text = "Total Points: " + totalPoints.ToString();
        resultLevelText.text = "Level "+ level.ToString() + " Points: "+ points.ToString();
        
        nextLevelButton.onClick.RemoveAllListeners();
        if (isSuccess) {
            outcomeText.text = "END OF LEVEL " + level.ToString();
            levelDescription.text = "YOU MEET THE QUOTA, KEEP SLAYING THE SWARM!";
            nextLevelButton.onClick.AddListener(NextLevel);
            nextLevelButton.GetComponentInChildren<TextMeshProUGUI>().text = "NEXT LEVEL";
        } else {
            outcomeText.text = "GAME OVER";
            levelDescription.text = "YOU HAVE FAILED TO MEET QUOTA, THANK YOU FOR YOUR SERVICE!";
            nextLevelButton.onClick.AddListener(RestartLevel);
            nextLevelButton.GetComponentInChildren<TextMeshProUGUI>().text = "NEW RUN";
        }
    }

    void NextLevel() {
        level++;
        points = 0;
        quota += 10;
        levelTime = 60f;
        resultPanel.SetActive(false);
        StartLevel();
    }

    void RestartLevel() {
        resultPanel.SetActive(false);
        SceneManager.LoadScene(SceneManager.GetActiveScene().name);
        // StartLevel();
    }

    void FailLevel() {
        Debug.Log("Time's up! Try again.");
        resultPanel.SetActive(false);
        SceneManager.LoadScene(SceneManager.GetActiveScene().name); //reloads scene from start
    }

    void UpdateLevelText() {
        levelText.text = "LEVEL: " + level.ToString();
    }

    void UpdateTimeText()
    {
        int minutes = Mathf.FloorToInt(timeRemaining / 60);
        int seconds = Mathf.FloorToInt(timeRemaining % 60);
        timeText.text = "TIMER: " + minutes.ToString("0") + ":" + seconds.ToString("00");
    }

    void UpdatePointText()
    {
        pointText.text = "POINTS: " + points.ToString();
    }

    void UpdateQuotaText() {
        quotaText.text = "QUOTA: " + quota.ToString();
    }
}
