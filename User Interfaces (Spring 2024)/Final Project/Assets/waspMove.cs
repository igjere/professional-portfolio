using UnityEngine;

public class waspMove : MonoBehaviour
{
    public float moveSpeed = 4f;
    public float directionChangeInterval = 0.75f;
    public int hitPoints = 3;
    public LevelManager levelMan;

    private Rigidbody2D rb;
    private Vector2 movement;
    private int currentHits = 0;
    private float directionTimer = 0;

    void Start()
    {
        rb = GetComponent<Rigidbody2D>();
        ChangeDirection();
    }

    void Update()
    {
        directionTimer += Time.deltaTime;
        
        if (directionTimer >= directionChangeInterval)
        {
            directionTimer = 0f;
            ChangeDirection();
        }

        RotateTowardsMovementDirection();
    }

    void FixedUpdate()
    {
        rb.velocity = movement * moveSpeed;
    }

    private void ChangeDirection()
    {
        float angle = Random.Range(0, 360) * Mathf.Deg2Rad;
        movement = new Vector2(Mathf.Cos(angle), Mathf.Sin(angle));
    }

    private void RotateTowardsMovementDirection()
    {
        if (movement != Vector2.zero)
        {
            float angle = Mathf.Atan2(movement.y, movement.x) * Mathf.Rad2Deg;
            angle += 180; // Rotate 180 degrees to face left
            rb.transform.rotation = Quaternion.AngleAxis(angle, Vector3.forward);
        }
    }

    private void OnMouseDown()
    {
        currentHits++;
        if (currentHits >= hitPoints)
        {
            levelMan.ScorpionClicked();
            Destroy(gameObject);
        }
    }
}
