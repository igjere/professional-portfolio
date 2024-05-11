using UnityEngine;

public class termiteMove : MonoBehaviour
{
    public float moveSpeed = 1.5f;
    public float directionChangeInterval = 1.5f;
    public LevelManager levelMan;

    private Rigidbody2D rb;
    private Vector2 movement;

    void Start()
    {
        rb = GetComponent<Rigidbody2D>();
        ChangeDirection();
    }

    void Update()
    {
        if (Time.time >= directionChangeInterval)
        {
            ChangeDirection();
            directionChangeInterval += Time.time + Random.Range(1.0f, 2.0f);
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
            angle += 200; 
            rb.transform.rotation = Quaternion.AngleAxis(angle, Vector3.forward);
        }
    }

    private void OnMouseDown()
    {
        levelMan.TermiteClicked();  
        Destroy(gameObject);
    }
}
